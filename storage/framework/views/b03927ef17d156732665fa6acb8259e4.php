<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Equipamento
                    <a href="<?php echo e(url('equipamento')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Equipamento
                    </a>
                </div>
                <div class="card-body">
                    <?php if(Session::has('mensagem_sucesso')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('mensagem_sucesso')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('mensagem_erro')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('mensagem_erro')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Route::is('equipamento.show')): ?>
                        <?php echo Form::model($equipamento,
                        ['method'=>'PATCH',
                        'url'=>'equipamento/'.$equipamento->id]); ?>

                    <?php else: ?>
                        <?php echo Form::open(['method'=>'POST', 'url'=>'equipamento']); ?>

                    <?php endif; ?>
                    <?php echo Form::label('nome', 'Nome'); ?>

                    <?php echo Form::input('text', 'nome',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Nome',
                        'required',
                        'maxlenght'=>150,
                        'autofocus']); ?>

                    <?php echo Form::label('data_aquisicao', 'Data Aquisição'); ?>

                    <?php echo Form::input('date', 'data_aquisicao',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Data Aquisição',
                        'required']); ?>

                    <?php echo Form::label('tipo_id', 'Tipo'); ?>

                    <?php echo Form::select('tipo_id',
                        $tipos,
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Selecione o Tipo',
                        'required']); ?>

                    <?php echo Form::submit('Salvar',
                        ['class'=>'float-end btn btn-primary mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/equipamento/formulario.blade.php ENDPATH**/ ?>