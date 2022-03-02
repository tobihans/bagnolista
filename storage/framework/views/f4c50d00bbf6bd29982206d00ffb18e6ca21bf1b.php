<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-3 flex justify-end">
                    <a href="<?php echo e(route('cars.create')); ?>" class="block text-sm text-slate-500
                              mr-0 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-50
                              hover:bg-violet-600">Nouveau</a>
                </div>
                <hr class="pb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left" colspan="2">#</th>
                            <th class="p-2 text-left">Catégorie</th>
                            <th class="p-2 text-left">Marque</th>
                            <th class="p-2 text-left">Modèle</th>
                            <th class="p-2 text-left">Disponible</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <?php $__currentLoopData = $cars->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php
                                    $url = explode(PHP_EOL, $c->photos)[0];
                                    $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                                ?>
                                <td class="p-2 font-light text-sm flex">
                                    <?php echo e($loop->index + 1); ?>

                                </td>
                                <td><img src="<?php echo e($is_full_url ? $url : asset('storage/' . $url)); ?>" height="45" width="45"></td>
                                <td class="p-2"><a
                                        href="<?php echo e(route('cars.show', $c->id)); ?>"><?php echo e($c->category->name); ?></a></td>
                                <td class="p-2"><?php echo e($c->brand->name); ?></td>
                                <td class="p-2"><?php echo e($c->model); ?></td>
                                <td class="p-2 font-semibold"><?php echo e($c->is_available ? 'Oui' : 'Non'); ?></td>
                                <td class="p-2">
                                    <a class="font-light text-sm" href="<?php echo e(route('cars.edit', ['car' => $c->id])); ?>">
                                        <i class="fa-solid fa-pen-to-square fa"></i>&nbsp;&nbsp;Editer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="text-right p-2">
                        <?php echo e($cars->links()); ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/cars/index.blade.php ENDPATH**/ ?>