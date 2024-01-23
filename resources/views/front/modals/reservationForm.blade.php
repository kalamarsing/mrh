<div id="mws-form-dialog9">
    <div class="mws-panel-body no-padding">
        <form class="mws-form " action="/cnt/_amReserva.php" method="POST"  id="blocked_form" >
            <p style="display: none; color: red;" id="missing_message"><strong>Required fields are missing</strong></p>
            <p style="display: none; color: red;" id="booked_message"><strong>Not available for this dates</strong></p>
            <fieldset class="mws-form-inline">
                <div class="mws-form-row">
                    <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Confirmation Code<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="num_reserva" name="num_reserva" class="required" value="">
                            </div>
                        </div>
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Piso<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <?php if ($Android) { ?>
                                    <select class="large" name="property_id" id="property_id" style="float: left;">
                                <?php  } else { ?>
                                    <select class="mws-select2 large" name="property_id" id="property_id" style="float: left;">
                                <?php } ?>
                                    <option value="-1" >Seleccione...</option>

                                    <?php foreach ($properties as $property) { ?>
                                        <option value="<?php echo $property->id; ?>" ><?php echo $property->name; ?></option>
                                    <?php  } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Guest Name<span class="required">*</span></label>
                            <div class="mws-form-item ">
                                <input type="text" id="host_name"  name="host_name"  class="required" value="">
                            </div>
                        </div>
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Email</label>
                            <div class="mws-form-item">
                                <input type="email" name="host_email" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Phone</label>
                            <div class="mws-form-item">
                                <input type="text" name="host_phone" value="">
                            </div>
                        </div>
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Source<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <select class="large" name="web" id="web" style="float: left;">
                                <option value="Airbnb">AIRBNB</option>
                                <option value="Booking">Booking.com</option>
                                <option value="VMRBO">VMRBO</option>
                                <option value="HomeAway">HOMEAWAY</option>
                                <option value="MYRENTALHOST">MYRENTALHOST</option>
                                <option value="TRIPADVISOR">TRIPADVISOR</option>
                                <option value="Widmu">WIMDU</option>
                                <option value="OnlyApartaments">ONLYAPARTMENTS</option>
                                <option value="MisterBnB">MISTERBNB</option>
                                <option value="RENT PRIVATE VILLAS">RENT PRIVATE VILLAS</option>
                                <option value="google">google</option>
                                <option value="Coocon">COOCON</option>
                                <option value="PLUM GUIDE">PLUM GUIDE</option>
                                <option value="TUI VILLAS">TUI VILLAS</option>
                                <option value="SPOTAHOME">SPOTAHOME</option>
                                <option value="HOMELIKE">HOMELIKE</option>
                                <option value="FLIPKEY">FLIPKEY</option>
                                <option value="HOMESTAY">HOMESTAY</option>
                                <option value="KINDANCOE">KINDANCOE</option>
                                <option value="HOUSETRIP">HOUSETRIP</option>
                                <option value="SPAIN-HOLIDAY.COM">SPAIN-HOLIDAY.COM</option>
                                <option value="PRIVADA PROPIETARIO">PRIVADA PROPIETARIO</option>
                                <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                                <option value="Otro">OTRO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Check In<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="fecha_in" name="fecha_in" class="required mws-datepicker" value="">
                            </div>
                        </div>
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Check Out<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="fecha_out" name="fecha_out" class="required mws-datepicker" value="">
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-cols">
                        <div class="mws-form-col-2-8">
                            <label class="mws-form-label">Guests<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text"id="num_personas" name="num_personas" class="required" value="1">
                            </div>
                        </div>
                        <div class="mws-form-col-3-8">
                            <label class="mws-form-label">Night Price<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="precio_noche" name="precio_noche" class="required" value="0.00">
                            </div>
                        </div>
                        <div class="mws-form-col-3-8">
                            <label class="mws-form-label">Rental Income<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="rental_income" name="rental_income" class="required" value="0.00">
                            </div>
                        </div>

                    </div>


                    <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Website Cleaning costs<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="airbnb_extras" name="airbnb_extras" class="required" value="0.00">
                            </div>
                        </div>
                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Website Service Fee<span class="required">*</span></label>
                            <div class="mws-form-item">
                                <input type="text" id="airbnb_service_fee" name="airbnb_service_fee" class="required" value="0.00">
                            </div>
                        </div>

                    </div>

                    <div class="mws-form-cols">
                                <input type="hidden" name="pasaporte" class="pasaporte" value="">

                        <div class="mws-form-col-4-8">
                            <label class="mws-form-label">Pack<span class="required" >*</span></label>
                            <div class="mws-form-item">

                                <?php
                                if (Auth::user()->type == 'SuperUser') {
                                    $readonly_pack = '';
                                } else {
                                    $readonly_pack = 'readonly="readonly"';
                                } ?>
                                <?php if ($Android) {
                                    ?>
                                    <select class="large" name="pack_id" id="pack_id" style="float: left;" <?php echo $readonly_pack; ?>>
                                <?php
                                } else {
                                    ?>
                                    <select class="mws-select2 large" name="pack_id" id="pack_id" style="float: left;" <?php echo $readonly_pack; ?>>
                                <?php
                                } ?>
                                <option value="-1" >-- Pack por Defecto del Piso --</option>
                                <?php foreach ($packs as $pack) {
                                    ?>
                                    <option value="<?php echo $pack->id; ?>" ><?php echo $pack->name; ?></option>
                                <?php
                                } ?>

                            </select>
                            </div>
                        </div>

                    </div>


                    <div class="mws-form-cols">
                        <div class="mws-form-col-8-8">
                            <label class="mws-form-label">Observaciones</label>
                            <div class="mws-form-item">
                                <textarea name="observaciones" style="height:50px;" ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mws-button-row" style="margin-top: 10px;">
                        <input type="button" id="crear_button" value="Guardar" class="btn btn-primary" onclick="isValidReservationForm()">

                        <img src=images/loading.gif id="loading_gif" style="display: none;"/>

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

        function isValidReservationForm() {
            var num_reserva = $('#num_reserva').val(),
                host_name = $('#host_name').val(),
                fecha_in = $('#fecha_in').val(),
                fecha_out = $('#fecha_out').val(),
                num_personas = $('#num_personas').val(),
                rental_income = $('#rental_income').val(),
                reservaId = 0,
                piso = $('#piso').val();
                errores = false;


            $('#missing_message').hide();
            $('#booked_message').hide();


            if(num_reserva == ''){
                errores = true;
            }
            if(host_name == ''){
                errores = true;
            }
            if(fecha_in == ''){
                errores = true;
            }
            if(fecha_out == ''){
                errores = true;
            }
            if(num_personas == ''){
                errores = true;
            }
            if(rental_income == ''){
                errores = true;
            }
            if(piso == '-1'){
                errores = true;
            }


            if(errores){
                $('#missing_message').show();
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
                            $('#booked_message').show();
                            $('#loading_gif').hide();
                            $('#crear_button').show()
                            return false;
                        }else{
                            $('#blocked_form').submit();
                        }
                    });

            }

        }
    </script>

@endpush