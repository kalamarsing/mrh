    <div id="mws-form-dialog001">
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/cnt/_amIncome.php" method="POST">

                <fieldset class="wizard-step mws-form-inline">
                    <div class="mws-form-row" style="padding-bottom:0px">
                        <div class="mws-form-cols">
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Confirmation Code</label>
                                <div class="mws-form-item">
                                    <input type="text" name="confirmation_code" id="confirmation_code" value ="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Property</label>
                                <div class="mws-form-item">
                                    <input type="text" name="property" id="property" value="" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mws-form-row" style="padding-bottom:0px">
                        <div class="mws-form-cols">
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Guest Name</label>
                                <div class="mws-form-item">
                                    <input type="text" name="guest_name" id="guest_name" value ="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Guest Email</label>
                                <div class="mws-form-item">
                                    <input type="text" name="guest_email" id="guest_email" value="" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-row" style="padding-bottom:0px">
                        <div class="mws-form-cols">
                            <div class="mws-form-col-3-8">
                                <label class="mws-form-label" style="font-weight:bold">Rental Income</label>
                                <div class="mws-form-item">
                                    <input type="text" name="rental_income" id="rental_income2" value ="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-2-8">
                                <label class="mws-form-label" style="font-weight:bold">Guests</label>
                                <div class="mws-form-item">
                                    <input type="text" name="guests" id="guests" value ="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-3-8">
                                <label class="mws-form-label" style="font-weight:bold">Web</label>
                                <div class="mws-form-item">
                                    <input type="text" name="web" id="web" value="" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-row" style="padding-bottom:0px">
                        <div class="mws-form-cols">
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Check In</label>
                                <div class="mws-form-item">
                                    <input type="text" name="checkin" id="checkin" value ="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Check Out</label>
                                <div class="mws-form-item">
                                    <input type="text" name="checkout" id="checkout" value ="" readonly="readonly">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mws-form-row" style="padding-bottom:0px">
                        <div class="mws-form-cols">
                        <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Check In Asignation</label>
                                <div class="mws-form-item">
                                    <input type="text" name="asigned" id="asigned" value="" readonly="readonly">
                                </div>
                            </div>
                            <div class="mws-form-col-4-8">
                                <label class="mws-form-label" style="font-weight:bold">Check In Payment Status</label>
                                <div class="mws-form-item">
                                    <input type="text" name="ci_payment_status" id="ci_payment_status" value="" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mws-form-row" >
                        <div class="mws-form-cols">
                        <div class="mws-form-col-8-8">
                                <label class="mws-form-label" style="font-weight:bold">Arrival Form</label>
                                <div class="mws-form-item" id="arrival">

                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="reservaId" id="reservaId" class="" value="0">
                    <br clear="all">

                    <input type="button" value="Ver/Editar Reserva" onclick="var reservaId = $('#reservaId').val(); window.location='http://'+window.location.hostname+'/reserva.php?id='+reservaId+'&return=calendar'"  class="btn btn-primary">

                </fieldset>

                <input type="hidden" name="form" class="" value="phpform">

            </form>
        </div>

    </div>

@push('javascripts')

@endpush