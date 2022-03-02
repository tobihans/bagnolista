<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/cars_form.js')); ?>" defer></script>
    <?php $__env->stopPush(); ?>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 mw-full">
                <form x-data="form" x-ref="form" action="<?php echo e(route('cars.store')); ?>" method="POST"
                      enctype="multipart/form-data"
                      class="flex flex-col px-3 py-6 bg-white border-b border-gray-200">
                    <?php echo csrf_field(); ?>
                    <div class="text-indigo-600 font-semibold text-xl mx-2 mb-4 uppercase">
                        <span>Enregistrement</span>
                        <hr class="my-2">
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col w-6/12 m-2">
                            <label for="brand" class="text-indigo-700">Marque</label>
                            <select class="mt-4 rounded" id="brand" name="brand">
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-6/12 m-2">
                            <label for="category" class="text-indigo-700">Categorie</label>
                            <select class="mt-4 rounded" id="category" name="category">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="" value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col sm:flex grow m-2">
                            <label for="model" class="text-indigo-700">Modèle</label>
                            <input type="text" id="model" name="model" class="mt-4 rounded" required>
                        </div>
                        <div class="flex flex-col grow m-2">
                            <label for="pricing" class="text-indigo-700">Prix de la location</label>
                            <input type="number" id="pricing" name="pricing" class="mt-4 rounded" required>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col basis-6/12 m-2">
                            <label for="brand" class="text-indigo-700">Photos</label>
                            <input name="photos[]" type="file" class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded file:border-0
                              file:text-sm file:font-semibold
                              file:bg-violet-50 file:text-violet-700
                              hover:file:bg-violet-100" multiple required>
                        </div>
                    </div>
                    <!-- Specs Data Edition -->
                    <div x-ref="pairsBlock">
                        <div class="text-indigo-700  m-2">Spécifications</div>
                        <div class="flex justify-between" x-ref="keyValBlock">
                            <label class="flex flex-col grow m-2">
                                <span class="text-indigo-700 text-sm font-semibold">Clé</span>
                                <input type="text" id="desc_keys" name="desc_keys[]" placeholder="E.g Moteur"
                                       class="mt-4 rounded" required>
                            </label>
                            <label class="flex flex-col grow m-2">
                                <span class="text-indigo-700 text-sm font-semibold">Valeur</span>
                                <input type="text" id="desc_values" name="desc_values[]" placeholder="Diesel"
                                       class="mt-4 rounded" required>
                            </label>
                        </div>
                        <template x-for="i in pairPropertiesCount">
                            <div class="flex justify-between" x-ref="keyValBlock">
                                <label class="flex flex-col grow m-2">
                                    <input type="text" id="desc_keys" name="desc_keys[]" class="mt-4 rounded" required>
                                </label>
                                <label class="flex flex-col grow m-2">
                                    <input type="text" id="desc_values" name="desc_values[]" class="mt-4 rounded"
                                           required>
                                </label>
                            </div>
                        </template>
                        <div class="flex justify-end" x-ref="pairBtn">
                            <button @click.prevent="pairPropertiesCount += 1" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-50 text-violet-700
                              hover:bg-violet-100">
                                Ajouter
                            </button>
                            <button x-show="pairPropertiesCount > 0" @click.prevent="pairPropertiesCount -= 1" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-red-700 text-violet-50
                              hover:bg-red-800">
                                Retirer
                            </button>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="flex-col">
                        <label class="text-indigo-700">Description</label>
                        <div class="rounded bg-violet-50 p-6 w-full my-4 flex justify-center">
                            <div id="editor" class="w-4/6 bg-white rounded p-4"></div>
                        </div>
                        <input type="hidden" x-model="description" name="description">
                    </div>
                    <div class="flex justify-end">
                        <button @click.prevent="submit" class="block text-sm text-slate-500
                              m-2 mr-0 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-50
                              hover:bg-violet-600">Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/admin/cars/create.blade.php ENDPATH**/ ?>