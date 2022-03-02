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
                <hr class="pb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <?php if($is_admin): ?>
                            <th class="p-2 text-left">Utilisateur</th>
                            <?php endif; ?>
                            <th class="p-2 text-left">Voiture</th>
                            <th class="p-2 text-left">Date</th>
                            <th class="p-2 text-left">Durée</th>
                            <?php if(!$is_admin): ?>
                                <th class="p-2 text-left"></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="p-2 font-light text-sm"><?php echo e($loop->index + 1); ?></td>
                                <?php if($is_admin): ?>
                                <td class="p-2"><?php echo e($r->user->name); ?></td>
                                <?php endif; ?>
                                <td class="p-2">
                                    <span class="font-sans font-semibold"><?php echo e($r->car->category->name); ?>,</span>
                                    <span><?php echo e($r->car->brand->name . ' ' . $r->car->model); ?></span>
                                </td>
                                <td class="p-2"><?php echo e($r->starts_at); ?></td>
                                <td class="p-2"><?php echo e($r->duration); ?></td>
                                <?php if(!$is_admin): ?>
                                    <td class="p-2 text-sm">
                                        <form method="POST" action="<?php echo e(route('reservations.destroy', ['reservation' => $r->id])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <a href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                                Libérer
                                            </a>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="text-right p-2">
                        <?php echo e($reservations->links()); ?>

                        
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
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/reservations/index.blade.php ENDPATH**/ ?>