<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <?php $__env->stopPush(); ?>
    <div class="w-full bg-white min-h-screen flex justify-between cover">
        <div class="w-5/12 px-8 py-12 flex flex-col justify-center items-start text-white">
            <p class="text-7xl uppercase font-bold brand-name">Bagnolista</p>
            <p class="my-4 text-2xl uppercase">
                
                
                Etreignez le volant des plus belles <span class="font-semibold">montures</span>!
            </p>
            <a href="#shop" class="block text-sm text-slate-500
            text-xl
                              m-2 py-2 px-4 ml-0
                              rounded border-0
                              text-sm font-semibold
                              bg-white text-gray-900
                              hover:bg-white-800">Trouver une voiture
            </a>
        </div>
    </div>
    <div id="shop" class="pt-20 min-h-screen flex max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white">
        <div class="w-2/12 flex flex-col">
            <div class="">
                <div class="h16 bg-cyan-600 text-cyan-50 py-2 px-4 border-x-2 border-cyan-600">Marques</div>
                <div class="flex flex-wrap border-x">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $selected = $b == $search_brand
                        ?>
                        <a href="?brand=<?php echo e($b); ?>#shop" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'block',
                                        'text-sm',
                                        'm-2',
                                        'p-2',
                                        'rounded-full',
                                        'border-0',
                                        'text-xs',
                                        'font-semibold',
                                        'bg-cyan-700' => $selected,
                                        'text-cyan-50' => $selected,
                                        'hover:bg-cyan-600' => $selected,
                                        'bg-cyan-50' => !$selected,
                                        'text-cyan-700' => !$selected,
                                        'hover:bg-cyan-100' => !$selected,
]) ?>">
                            <?php echo e($b); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="my-2">
                <div class="h16 bg-emerald-600 text-emerald-50 py-2 px-4 border-x-2 border-emerald-600">Catégories</div>
                <div class="flex flex-wrap border-x">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $selected = $c == $search_category
                        ?>
                        <a href="?category=<?php echo e($c); ?>#shop" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'block',
                                        'text-sm',
                                        'm-2',
                                        'p-2',
                                        'rounded-full',
                                        'border-0',
                                        'text-xs',
                                        'font-semibold',
                                        'bg-emerald-700' => $selected,
                                        'text-emerald-50' => $selected,
                                        'hover:bg-emerald-600' => $selected,
                                        'bg-emerald-50' => !$selected,
                                        'text-emerald-700' => !$selected,
                                        'hover:bg-emerald-100' => !$selected,
]) ?>">
                            <?php echo e($c); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="w-10/12 flex flex-col">
            <div class="h-16 px-4 flex justify-center items-center relative">
                <form class="flex justify-center grow">
                    <input type="search" placeholder="E.g Bentley 1960, Chevrolet Camaro (Not impl...)"
                           class="rounded min-w-64 w-5/12">
                    <button class="ml-4 block text-sm text-slate-500
                              mr-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-50
                              hover:bg-violet-600">Rechercher
                    </button>
                </form>
                <hr class="w-full absolute" style="bottom: 0;">
            </div>
            <div class="cars-container grow p-6 flex flex-wrap justify-center gap-y-0.5 gap-x-2">
                <?php $__currentLoopData = $cars->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $photos = explode(PHP_EOL, $c->photos);
                        $url = $photos[0];
                        $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                    ?>
                    <div class="car-card max-h-80 rounded overflow-hidden shadow-lg my-2">
                        <img class="w-full" src="<?php echo e($is_full_url ? $url : asset('storage/' . $url)); ?>"
                             alt="Sunset in the mountains">
                        <div class="px-6 py-2">
                            <div class="font-bold text-xl mb-2"><?php echo e($c->model); ?></div>
                            <div class="text-gray-700 text-base flex justify-between">
                                <span><?php echo e($c->brand->name); ?></span>
                                <span class="font-light text-sm"><?php echo e($c->pricing . ' XOF'); ?></span>
                            </div>
                        </div>
                        <div class="px-6 py-4 flex">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
             #<?php echo e(Str::substr($c->category->name, 0, 15)); ?><?php echo e(Str::length($c->category->name) > 15 ? '...' : ''); ?>

           </span>
                            <a
                                href="<?php echo e(route('cars.show', ['car' => $c->id])); ?>"
                                class="inline-block
                            bg-gray-200 rounded-full px-3 py-1 text-sm
                            font-semibold text-white mr-2
                            ml-auto bg-gradient-to-br from-cyan-600 to-emerald-800">Voir&nbsp;<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="ml-4 mb-4">
                <?php echo e($cars->fragment('shop')->links()); ?>

            </div>
        </div>
    </div>
    <style>
        .cars-container {
            align-items: flex-start;
        }

        .car-card {
            max-width: 18rem;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/welcome.blade.php ENDPATH**/ ?>