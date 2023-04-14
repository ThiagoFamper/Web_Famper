<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Cliente
                    <a href="<?php echo e(url('cliente')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Cliente
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
                    <?php if(Route::is('cliente.show')): ?>
                        <?php echo Form::model($cliente,
                        ['method'=>'PATCH',
                        'url'=>'cliente/'.$cliente->id]); ?>

                    <?php else: ?>
                        <?php echo Form::open(['method'=>'POST', 'url'=>'cliente']); ?>

                    <?php endif; ?>
                    <?php echo Form::label('nome', 'Nome'); ?>

                    <?php echo Form::input('text', 'nome',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Nome',
                        'required',
                        'maxlenght'=>50,
                        'autofocus']); ?>

                    <?php echo Form::label('endereco', 'Endereço'); ?>

                    <?php echo Form::input('text', 'endereco',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Endereço',
                        'required',
                        'maxlenght'=>150]); ?>

                    <?php echo Form::label('fone', 'Telefone'); ?>

                    <?php echo Form::input('text', 'fone',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Telefone',
                        'required',
                        'maxlenght'=>20]); ?>

                    <?php echo Form::submit('Salvar',
                    ['class'=>'float-end btn btn-primary mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/cliente/formulario.blade.php ENDPATH**/ ?>