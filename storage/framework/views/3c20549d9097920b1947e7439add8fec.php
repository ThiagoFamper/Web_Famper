<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Reserva
                    <a href="<?php echo e(url('reserva/create')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Reserva
                    </a>
                </div>
                <div class="card-body">
                    <?php if(Session::has('mensagem_sucesso')): ?>
                        <div class="alert alert-sucess">
                            <?php echo e(Session::get('mensagem_sucesso')); ?>

                        </div>
                    <?php endif; ?>
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Equipamento</th>
                                <th>Local</th>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Devolução</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($reserva->id); ?></td>
                                    <td><?php echo e($reserva->equipamento_id); ?></td>
                                    <td><?php echo e($reserva->local_id); ?></td>
                                    <td><?php echo e($reserva->cliente_id); ?></td>
                                    <td><?php echo e($reserva->data); ?></td>
                                    <td><?php echo e($reserva->horario); ?></td>
                                    <td><?php echo e($reserva->devolucao); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('reserva/'.$reserva->id)); ?>"
                                        class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                    <?php echo Form::open([
                                        'method'=>'DELETE',
                                        'url'=>'reserva/'.$reserva->id,
                                        'style'=>'display:inline'
                                    ]); ?>

                                        <button type="submit"
                                        Class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    <?php echo Form::close(); ?>

                                    <?php echo Form::open([
                                        'method'=>'POST',
                                        'url'=>'reserva/devolver/'.$reserva->id,
                                        'style'=>'display:inline'
                                    ]); ?>

                                        <button type="submit"
                                        Class="btn btn-info btn-sm">
                                            Devolver
                                        </button>
                                    <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3">
                                        Não há itens para listar!
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        <?php echo e($reservas->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/reserva/lista.blade.php ENDPATH**/ ?>