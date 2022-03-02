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
        <script>
            <?php
                $desc = json_decode($car->description, true)
            ?>
            const data = <?php echo e(Js::from($desc)); ?>;
        </script>
        <script src="<?php echo e(asset('js/readonly-editor.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
    <?php
        $photos = explode(PHP_EOL, $car->photos);
        $url = $photos[0];
        $is_full_url = Str::startsWith($url, ['http://', 'https://']);
    ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                <!-- Photos -->
                <div class="flex justify-between">
                    <div class="w-10/12 mr-4">
                        <img class="rounded"
                             src="<?php echo e($is_full_url ? $url : asset('storage/' . $url)); ?>"
                             alt="Image descriptive de <?php echo e($car->model); ?>">
                    </div>
                    <?php
                        $count = count($photos);
                    ?>
                    <div class="w-2/12 p-2 bg-violet-100 rounded flex flex-col justify-start">
                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->index == 0) continue; ?>
                            <?php
                                $url = $p;
                                $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                            ?>
                            <img
                                src="<?php echo e($is_full_url ? $url : asset('storage/' . $url)); ?>"
                                width="150" height="150" class="mx-auto my-2 rounded self-center">
                            <?php if($loop->iteration == 7) break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- Name + Desc -->
                <div class="mt-6">
                    <div class="text-4xl font-semibold flex">
                        <span class="mr-auto"><?php echo e($car->brand->name . ' ' . $car->model); ?></span>
                        <?php if($car->is_available): ?>
                        <a href="#" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-100
                              hover:bg-violet-600">Réserver</a>
                        <?php endif; ?>
                        <?php if(Auth::user() && Auth::user()->is_admin): ?>
                            <a href="<?php echo e(route('cars.edit', ['car' => $car->id])); ?>" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-red-700 text-violet-50
                              hover:bg-red-600">Modifier</a>
                        <?php endif; ?>
                    </div>
                    <p class="text-violet-700">
                        <?php if(!($desc) || ($desc && count($desc['blocks']) == 0)): ?>
                            Aucune
                        <?php endif; ?>
                        Description
                    </p>
                    <div id="editor"></div>
                    <div class="mt-6">
                        <table class="table-auto border-collapse w-6/12">
                            <thead class="font-semibold text-lg">
                            <tr>
                                <th colspan="2" class="p-2 font-medium text-normal align-center border">
                                    Caractéristiques
                                </th>
                            </tr>
                            </thead>
                            <?php
                                $specs = json_decode($car->specs, true)
                            ?>
                            <tbody class="divide-y">
                            <?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="p-2 font-light text-sm border"><?php echo e($k); ?></td>
                                    <td class="p-2 font-light text-sm border"><?php echo e($v); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        td {
            text-align: center;
        }

        /* Customize Editor.JS blocks to fit into the page */
        .codex-editor__redactor {
            padding-bottom: 0 !important;
            text-align: left !important;
        }

        .ce-block__content {
            margin: 0;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/cars/show.blade.php ENDPATH**/ ?>