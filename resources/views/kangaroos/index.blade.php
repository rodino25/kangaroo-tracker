@extends("_layouts.app")

@section("header")
<!-- DevExtreme library -->
<link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.5/css/dx.light.css">
<script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.5/js/dx.all.js"></script>
@endSection

@section("content")
<div class="dx-viewport">
    <div class="mb-2">
        <button class="btn btn-info btn-sm" title="Add" onclick="selectedKangaroo = null; showKangarooModal();">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div id="gridContainer"></div>
</div>
@endSection

@section("footer")
@include("_modals.kangaroo")

<script src="https://cdnjs.cloudflare.com/ajax/libs/devextreme-aspnet-data/2.9.3/dx.aspnet.data.min.js"></script>
<script src="/assets/js/kangaroo.js"></script>

@endSection