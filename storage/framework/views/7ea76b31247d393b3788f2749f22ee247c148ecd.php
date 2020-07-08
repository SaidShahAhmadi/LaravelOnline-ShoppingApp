<input type="hidden" class="form-control" name="<?php echo e($row->field); ?>"
       placeholder="<?php echo e($row->getTranslatedAttribute('display_name')); ?>"
       <?php echo isBreadSlugAutoGenerator($options); ?>

       value="<?php echo e(old($row->field, $dataTypeContent->{$row->field} ?? $options->default ?? '')); ?>">
<?php /**PATH C:\xampp\htdocs\new\vendor\tcg\voyager\src/../resources/views/formfields/hidden.blade.php ENDPATH**/ ?>