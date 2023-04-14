<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Equipamento
                    <a href="<?php echo e(url('equipamento/create')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Equipamento
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
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Data Aquisição</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $equipamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($equipamento->id); ?></td>
                                    <td><?php echo e($equipamento->nome); ?></td>
                                    <td><?php echo e($equipamento->tipo->titulo); ?></td>
                                    <td><?php echo e($equipamento->data_aquisicao); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('equipamento/'.$equipamento->id)); ?>"
                                        class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                    <?php echo Form::open([
                                        'method'=>'DELETE',
                                        'url'=>'equipamento/'.$equipamento->id,
                                        'style'=>'display:inline'
                                    ]); ?>

                                        <button type="submit"
                                        Class="btn btn-danger btn-sm">
                                            Excluir
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
                        <?php echo e($equipamentos->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/equipamento/lista.blade.php ENDPATH**/ ?>