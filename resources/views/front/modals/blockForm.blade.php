@php
    $packs = \App\Entities\Pack::all();
    $properties= \App\Entities\Properties::all();
@endphp

    <div id="mws-form-dialog9b">
        <div class="mws-panel-body no-padding">
            <form class="mws-form " action="/cnt/_amBloqueo.php" id="blocked_formb" method="POST" >
                <p style="display: none; color: red;" id="missing_messageb"><strong>Required fields are missing</strong></p>
                <p style="display: none; color: red;" id="booked_messageb"><strong>Not available for this dates</strong></p>
                <fieldset class="mws-form-inline">
                    <div class="mws-form-row">
                        <div class="mws-form-cols">

                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label">Piso<span class="required">*</span></label>
                                <div class="mws-form-item">
                                    <?php if ($Android) {
                                        ?>
                                        <select class="large" name="propertyb" id="propertyb" style="float: left;">
                                    <?php
                                    } else {
                                        ?>
                                        <select class="mws-select2 large" name="propertyb" id="propertyb" style="float: left;">
                                    <?php
                                    } ?>
                                        <option value="-1" >Seleccione...</option>

                                        <?php foreach ($properties as $property) {
                                        ?>
                                        <option value="<?php echo $property->id; ?>" ><?php echo $property->name; ?></option>
                                        <?php
                                    } ?>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="web" id="web" class="" value="Blocked">

                        </div>


                        <div class="mws-form-cols">
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label">Check In<span class="required">*</span></label>
                                <div class="mws-form-item">
                                    <input type="text" id="fecha_inb" name="fecha_inb" class="required mws-datepicker" value="">
                                </div>
                            </div>
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label">Check Out<span class="required">*</span></label>
                                <div class="mws-form-item">
                                    <input type="text" id="fecha_outb" name="fecha_outb" class="required mws-datepicker" value="">
                                </div>
                            </div>
                        </div>


                        <div class="mws-form-cols">
                            <div class="mws-form-col-8-8">
                                <label class="mws-form-label">Observaciones</label>
                                <div class="mws-form-item">
                                    <textarea name="observacionesb" style="height:50px;" ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mws-button-row" style="margin-top: 10px;">
                            <input type="button" id="crear_buttonb" value="Guardar" class="btn btn-primary" onclick="isValidBlockForm()">
                                <img src=images/loading.gif id="loading_gifb" style="display: none;"/>
                        </div>
                    </div>

                    <input type="hidden" name="form" class="" value="phpform">
                    <input type="hidden" name="return" class="" value="calendar">

                </fieldset>

            </form>
        </div>

    </div>


@push('javascripts')
    <script>
            function isValidBlockForm() {
                var piso = $('#pisob').val();
                var reservaId = 0;
                var errores = false;
                var fecha_in = $('#fecha_inb').val();
                var fecha_out = $('#fecha_outb').val();

                $('#missing_messageb').hide();
                $('#booked_messageb').hide();


                if(piso == '-1'){
                    errores = true;
                }
                if(fecha_in == ''){
                    errores = true;
                }
                if(fecha_out == ''){
                    errores = true;
                }

                if(errores){
                    $('#missing_messageb').show();
                    $('#loading_gifb').hide();
                    $('#crear_buttonb').show()
                    return false;
                }else{
                    $.post ("cnt/_checkAvailability.php",{
                        fecha_in : fecha_in,
                        fecha_out : fecha_out,
                        piso: piso,
                        reservaId : reservaId
                        },
                        function(data){
                            var result =  data.split('--//--')[1];

                            if(result == '0'){
                                $('#booked_messageb').show();
                                $('#loading_gifb').hide();
                                $('#crear_buttonb').show()
                                return false;
                            }else{
                                $('#blocked_formb').submit();
                            }
                        });


                }

            }
    </script>

@endpush