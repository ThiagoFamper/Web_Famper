<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Tipo
                    <a href="<?php echo e(url('tipo')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Tipo
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
                    <?php if(Route::is('tipo.show')): ?>
                        <?php echo Form::model($tipo,
                        ['method'=>'PATCH',
                        'url'=>'tipo/'.$tipo->id]); ?>

                    <?php else: ?>
                        <?php echo Form::open(['method'=>'POST', 'url'=>'tipo']); ?>

                    <?php endif; ?>
                    <?php echo Form::label('titulo', 'Titulo'); ?>

                    <?php echo Form::input('text', 'titulo',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Titulo',
                        'required',
                        'maxlenght'=>50,
                        'autofocus']); ?>

                    <?php echo Form::label('icone', 'Icone (URL)'); ?>

                    <?php echo Form::input('text', 'icon',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Icone',
                        'required',
                        'maxlenght'=>150]); ?>

                    <?php echo Form::submit('Salvar',
                        ['class'=>'float-end btn btn-primary mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/tipo/formulario.blade.php ENDPATH**/ ?>