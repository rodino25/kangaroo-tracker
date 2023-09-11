<!-- Modal -->
<div class="modal fade" id="kangaroo-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-kangaroo">
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="name" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Nickname</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="nickname" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Weight</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="weight" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Height</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="height" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Gender</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="gender" class="form-control" required>
                                <option value="">---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Color</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="color" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Friendliness</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="friendliness" class="form-control">
                                <option value="">---</option>
                                <option value="friendly">Friendly</option>
                                <option value="independent">Independent</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <label class="col-form-label">Birthday</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="birthday" type="date" class="form-control" required />
                        </div>
                    </div>
                    <div class="text-end pt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>