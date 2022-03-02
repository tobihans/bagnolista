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
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-xl py-2">Salut <?php echo e(Auth::user()->name); ?>!</h1>
                    <div>
                        <p class="py-1">En résumé</p>
                        <div class="flex">
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-user fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        <?php echo e($user_stats); ?> Utilisateurs
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-car-side fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        <?php echo e($resa_stats); ?> Réservations
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-money-bill-1-wave fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        <?php echo e($payments_stats); ?> Transactions
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Réservations</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                            <tr>
                                <th class="p-2 text-left">#</th>
                                <th class="p-2 text-left">Utilisateur</th>
                                <th class="p-2 text-left">Voiture</th>
                                <th class="p-2 text-left">Date</th>
                                <th class="p-2 text-left">Durée</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="p-2 font-light text-sm"><?php echo e($loop->index + 1); ?></td>
                                    <td class="p-2"><?php echo e($r->user->name); ?></td>
                                    <td class="p-2">
                                        <span><b><?php echo e($r->car->brand->name); ?></b>&nbsp;&nbsp;<?php echo e($r->car->model); ?></span>
                                    </td>
                                    <td class="p-2"><?php echo e($r->starts_at); ?></td>
                                    <td class="p-2"><?php echo e($r->duration); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/reservations" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
                    </div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Voitures</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <th class="p-2 text-left">Catégorie</th>
                            <th class="p-2 text-left">Marque</th>
                            <th class="p-2 text-left">Modèle</th>
                            <th class="p-2 text-left">Disponible</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="p-2 font-light text-sm"><?php echo e($loop->index + 1); ?></td>
                                <td class="p-2"><?php echo e($c->category->name); ?></td>
                                <td class="p-2"><?php echo e($c->brand->name); ?></td>
                                <td class="p-2"><?php echo e($c->model); ?></td>
                                <td class="p-2 font-semibold"><?php echo e($c->is_available ? 'Oui' : 'Non'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/cars" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
                    </div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Transactions</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <th class="p-2 text-left">Utilisateur</th>
                            <th class="p-2 text-left">Montant</th>
                            <th class="p-2 text-left">Date</th>
                            <th class="p-2 text-left">Solde</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="p-2 font-light text-sm"><?php echo e($loop->index + 1); ?></td>
                                <td class="p-2"><?php echo e($p->user->name); ?></td>
                                <td class="p-2 font-semibold"><?php echo e($p->amount . ' XOF'); ?></td>
                                <td class="p-2"><?php echo e($p->created_at); ?></td>
                                <td class="p-2 font-semibold"><?php echo e($p->user->credits . ' XOF'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/payments" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
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
<?php /**PATH /home/tobi/Code/php/bagnolista/resources/views/dashboard.blade.php ENDPATH**/ ?>