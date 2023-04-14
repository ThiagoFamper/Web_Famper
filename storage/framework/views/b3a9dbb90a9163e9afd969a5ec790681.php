<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Reserva
                    <a href="<?php echo e(url('reserva')); ?>"
                    class="btn btn-success btn-sm float-end">
                        Novo Reserva
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
                    <?php if(Route::is('reserva.show')): ?>
                        <?php echo Form::model($reserva,
                        ['method'=>'PATCH',
                        'url'=>'reserva/'.$reserva->id]); ?>

                    <?php else: ?>
                        <?php echo Form::open(['method'=>'POST', 'url'=>'reserva']); ?>

                    <?php endif; ?>
                    <?php echo Form::label('equipamento_id', 'Equipamento'); ?>

                    <?php echo Form::select('equipamento_id',
                        $equipamentos,
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Selecione o Equipamento',
                        'required',
                        'autofocus']); ?>

                    <?php echo Form::label('local_id', 'Local'); ?>

                    <?php echo Form::select('local_id',
                        $locais,
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Selecione o Local',
                        'required']); ?>

                    <?php echo Form::label('cliente_id', 'Cliente'); ?>

                    <?php echo Form::select('cliente_id',
                        $clientes,
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Selecione o Cliente',
                        'required']); ?>

                    <?php echo Form::label('data', 'Data'); ?>

                    <?php echo Form::input('date', 'data',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Data',
                        'required']); ?>

                    <?php echo Form::label('horario', 'Hora'); ?>

                    <?php echo Form::input('time', 'horario',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Hora',
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Fontes\ProgWeb2023_Famper\Reservado\resources\views/reserva/formulario.blade.php ENDPATH**/ ?>