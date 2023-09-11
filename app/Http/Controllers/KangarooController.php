<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KangarooModel;

class KangarooController extends Controller
{
    // SEARCH
    public function index(Request $request) {
        $filter  = json_decode($request->filter);
        $sort    = json_decode($request->sort);
        $group   = json_decode($request->group);
        $skip    = intval($request->skip);
        $take    = intval($request->take) ? intval($request->take) : 10;
        $builder = KangarooModel::where(function($query) use ($filter) { 
            $this->filterSearch($query, $filter); 
        });

        // sort
        if (is_array($sort)) {
            foreach ($sort as $sortDetails) {
                $builder->orderBy(
                    $sortDetails->selector, 
                    $sortDetails->desc ? "DESC" : "ASC"
                );
            }
        }

        if (is_array($group)) {
            // group by filter
            foreach ($group as $groupDetails) {
                $builder->groupBy($groupDetails->selector);
                $builder->select($groupDetails->selector . " as key");
                $builder->addSelect(\DB::raw("count(".$groupDetails->selector.") as 'count'"));
            }

        } else {
            // fetch and paginate
            $builder->skip($skip)->take($take);
        }

        return response()->json([
            "data" => $builder->get(),
            "totalCount" => $builder->count()
        ]);
        
    }

    private function filterSearch($query, $filter, $condition = "") {
        $doFilter = function ($field, $rule, $search) use ($query, $condition) {
            switch ($rule) {
                case "contains":
                    $rule = "like";
                    $search = "%$search%";
                    break;

                case "notcontains":
                    $rule = "not like";
                    $search = "%$search%";
                    break;

                case "startswith":
                    $rule = "like";
                    $search = "$search%";
                    break;

                case "endswith":
                        $rule = "like";
                        $search = "%$search";
                        break;
            }

            if (!empty($rule) && !empty($search)) {
                if ($condition == "OR") {
                    $query->orWhere($field, $rule, $search);
                } else {
                    $query->where($field, $rule, $search);
                }
            }
        };

        if (is_array($filter)) {
            $condition = "";

            // single column search
            if (count($filter) == 3 && !is_array($filter[0])) {
                $field  = $filter[0]; // column name
                $rule   = $filter[1]; // dxgrid comparison rule (eg. contains, =)
                $search = $filter[2]; // search keyword

                $doFilter($field, $rule, $search);

            } else {
                // for multiple column search
                foreach ($filter as $filterItem) {
                    if (is_array($filterItem)) {
                        $this->filterSearch($query, $filterItem, $condition);

                    } else {
                        // if not an array must be a query condition (and / or)
                        if (in_array($filterItem, ["and", "or"])) {
                            $condition = strtoupper($filterItem);
                        }
                    }
                } 
            }
        }
    }

    // DROPDOWN OPTIONS IN SEARCH
    public function getOptions (Request $request) {
        $data = [];
        $config = config("constant.".$request->type);

        if (is_array($config)) {
            foreach ($config as $conf) {
                $data[] = [
                    "Value" => $conf,
                    "Text"  => ucfirst($conf)
                ];
            }
        }

        return response()->json([
            "data" => $data
        ]);
    }

    // DELETE
    public function destroy($id = 0) {
        $kangaroo = KangarooModel::find($id);

        if (!$kangaroo) {
            return response()->json([
                "message" => "Kangaroo not found!"
            ], 400);
        }
        return $kangaroo->delete();
    }

    // INSERT
    public function store(Request $request) {
        $rules = [
            "name"      => "required|unique:kangaroos",
            "weight"    => "required|numeric|min:0|not_in:0",
            "height"    => "required|numeric|min:0|not_in:0",
            "gender"    => "required|in:" . implode(",", config("constant.gender")),
            "birthday"  => "required|date",
            "friendliness" => "nullable|in:" . implode(",", config("constant.friendliness")),
        ];
        $validated = $request->validate($rules);
        $payload = $request->all();
        $payload["user_id"] = auth()->user()->id;
        $model = new KangarooModel;
        $model->fill($payload);
        return $model->save();
    }

    // UPDATE
    public function update(Request $request, $id = 0) {
        $rules = [
            "name"      => "required|unique:kangaroos,name,".$id,
            "weight"    => "required|numeric|min:0|not_in:0",
            "height"    => "required|numeric|min:0|not_in:0",
            "gender"    => "required|in:" . implode(",", config("constant.gender")),
            "birthday"  => "required|date",
            "friendliness" => "nullable|in:" . implode(",", config("constant.friendliness")),
        ];
        $validated = $request->validate($rules);
        $payload = $request->all();
        $payload["user_id"] = auth()->user()->id;
        $model = KangarooModel::find($id);
        $model->fill($payload);
        return $model->save();
    }
}
