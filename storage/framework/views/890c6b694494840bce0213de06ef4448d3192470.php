

<?php $__env->startSection("header"); ?>
<!-- DevExtreme library -->
<link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.5/css/dx.light.css">
<script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.5/js/dx.all.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="dx-viewport">
    <div class="mb-2">
        <button class="btn btn-info btn-sm" title="Add" onclick="selectedKangaroo = null; showKangarooModal();">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div id="gridContainer"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("footer"); ?>
<?php echo $__env->make("_modals.kangaroo", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/devextreme-aspnet-data/2.9.3/dx.aspnet.data.min.js"></script>
<script src="/assets/js/kangaroo.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("_layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kangaroo-tracker\resources\views/kangaroos/index.blade.php ENDPATH**/ ?>