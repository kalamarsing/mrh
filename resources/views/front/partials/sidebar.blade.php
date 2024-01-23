<div id="mws-sidebar">

    <!-- Hidden Nav Collapse Button -->
    <div id="mws-nav-collapse">
        <span></span>
        <span></span>
        <span></span>
    </div>


    <div id="mws-navigation" class="toggled"  style="overflow: hidden;">
        <ul>

            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="clientes.php" rel="3" ><i class="icon-business-card"></i> Clientes</a></li>
            <?php }elseif(Auth::user()->type =='Cliente'){ ?>
                <li><a href="clientec.php" rel="3" ><i class="icon-business-card"></i> <?php echo $txt_cliente_mi_perfil ?></a></li>

            <?php } ?>

            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="pisos.php" rel="2"><i class="icon-home"></i> Properties</a></li>
            <?php }elseif(Auth::user()->type =='Cliente'){ ?>
                <li><a href="pisosc.php" rel="2"><i class="icon-home"></i> <?php echo $txt_piso_pisos ?></a></li>
            <?php } ?>
            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="blanco.php" rel="17"><i class="icon-calendar"></i> Calendar</a></li>
            <?php }elseif(Auth::user()->type =='Cliente'){ ?>
                <li><a href="blancoc.php" rel="17"><i class="icon-calendar"></i> Calendar</a></li>
            <?php }elseif(Auth::user()->type =='Agente' && Auth::user()->role_id != 7 && Auth::user()->role_id != 8){ ?>
                <li><a href="blancoe.php" rel="17"><i class="icon-calendar"></i> Calendar</a></li>
            <?php } ?>


            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="reservas.php" rel="9" ><i class="icon-calendar-month"></i> Reservas</a></li>

            <?php } ?>
            <?php if(Auth::user()->type =='Cliente'){ ?>
                <li><a href="reservasc.php" rel="9" ><i class="icon-calendar-month"></i> <?php echo $txt_reservas_reservas ?></a></li>

            <?php } ?>
            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="checkins.php" rel="12" ><i class="icon-calendar-month"></i>  Check In</a>

                    <ul class="closed">
                        <li>
                            <a href="checkins.php" rel="1201">Próximos Check In</a>
                        </li>
                        <li>
                            <a href="assignedCheckins.php" rel="1203">Check In History</a>
                        </li>
                    </ul>

                </li>
            <?php } ?>

            <?php if(Auth::user()->type =='Agente' && Auth::user()->role_id == 8){ ?>
                <li><a href="checkins.php" rel="12" ><i class="icon-calendar-month"></i>  Check In</a>

                    <ul class="closed">
                        <li>
                            <a href="checkinsAL.php" rel="1201">Próximos Check In</a>
                        </li>
                        <!--li>
                            <a href="assignedCheckinsAL.php" rel="1203">Check In History</a>
                        </li-->
                    </ul>

                </li>
            <?php } ?>

            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="checkouts.php" rel="1" ><i class="icon-calendar-month"></i>  Cleaning</a>

                    <ul class="closed">
                        <li>
                            <a href="cleannings.php" rel="1403">Cleanings</a>
                        </li>
                        <li>
                            <a href="checkouts.php" rel="1401">Próximos Cleaning</a>
                        </li>
                        <li>
                            <a href="lcheckouts.php" rel="1405">Próximos Laundry Cleanings</a>
                        </li>
                        <li>
                            <a href="assignedCheckouts.php" rel="1402">Cleaning History</a>
                        </li>
                         <li>
                            <a href="ccategorias.php" rel="1404">Checklist Admin</a>
                        </li>

                    </ul>

                </li>
            <?php } ?>

            <?php if(Auth::user()->type =='Agente' && Auth::user()->role_id == 8){ ?>
                <li><a href="checkouts.php" rel="1" ><i class="icon-calendar-month"></i>  Cleaning</a>

                    <ul class="closed">
                        <!--li>
                            <a href="cleannings.php" rel="1403">Cleanings</a>
                        </li-->
                        <li>
                            <a href="checkoutsAL.php" rel="1401">Próximos Cleaning</a>
                        </li>
                        <!--li>
                            <a href="lcheckouts.php" rel="1405">Próximos Laundry Cleanings</a>
                        </li>
                        <li>
                            <a href="assignedCheckouts.php" rel="1402">Cleaning History</a>
                        </li>
                         <li>
                            <a href="ccategorias.php" rel="1404">Checklist Admin</a>
                        </li-->

                    </ul>

                </li>
            <?php } ?>
            <?php if(Auth::user()->type =='Agente' && Auth::user()->role_id == 3){ ?>
                <li><a href="checkinsa.php" rel="12" ><i class="icon-calendar-month"></i>  Mis Check-In</a>

                    <ul class="closed">
                        <li>
                            <a href="checkinsa.php" rel="1201">Próximos Check In</a>
                        </li>
                        <li>
                            <a href="assignedCheckinsa.php" rel="1203">Check In History</a>
                        </li>
                        <!--li>
                            <a href="checkouts.php" rel="1202">Próximos Checkouts</a>
                        </li-->

                    </ul>

                </li>
            <?php } ?>


            <?php if(Auth::user()->type =='Agente' && Auth::user()->role_id == 1){ ?>
                <li><a href="checkoutsa.php" rel="14" ><i class="icon-calendar-month"></i>  Cleanning</a>

                    <ul class="closed">
                        <li>
                            <a href="checkoutsa.php" rel="1401">Próximos Cleanning</a>
                        </li>
                        <li>
                            <a href="assignedCheckoutsa.php" rel="1402">Cleanning History</a>
                        </li>

                    </ul>

                </li>
            <?php } ?>

            <?php /* MANTENIMIENTO */ ?>
            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="checkouts.php" rel="15" ><i class="icon-tools"></i>  Mantenimiento</a>

                    <ul class="closed">
                        <li>
                            <a href="mantenimientos.php" rel="1501">Próximos Mantenimiento</a>
                        </li>
                        <li>
                            <a href="assignedMantenimientos.php" rel="1503">Mantenimiento History</a>
                        </li>
                    </ul>

                </li>
            <?php } ?>
            <?php if(Auth::user()->type =='Agente' && Auth::user()->role_id == 2){ ?>
                <li><a href="checkoutsa.php" rel="15" ><i class="icon-calendar-month"></i>  Mantenimiento</a>

                    <ul class="closed">
                        <li>
                            <a href="mantenimientosa.php" rel="1501">Mis Trabajos</a>
                        </li>
                        <li>
                            <a href="assignedMantenimientosa.php" rel="1503">Mantenimiento History</a>
                        </li>

                    </ul>

                </li>
            <?php } ?>
            <?php /* END MANTENIMIENTO */ ?>

            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="ogasto.php" rel="10" ><i class="icon-shopping-cart"></i> Gastos</a></li>
            <?php } ?>

            <?php if(Auth::user()->type =='SuperUser'){ ?>
                <li><a href="resumenes.php" rel="7" ><i class="icon-file-pdf"></i> Administracion</a>
                    <ul class="closed">
                        <li>
                            <a href="pagos.php" rel="704">Pagos</a>
                        </li>
                        <li>
                            <a href="global.php" rel="704">Generar/Enviar</a>
                        </li>
                        <li>
                            <a href="resumenes.php" rel="701">Resumenes</a>
                        </li>
                        <li>
                            <a href="facturas.php" rel="702">Facturas</a>
                        </li>
                        <li>
                            <a href="facturasf.php" rel="705">Facturas a Favor</a>
                        </li>
                        <li>
                            <a href="gestoria.php" rel="708">Gestoria</a>
                        </li>
                        <li>
                            <a href="packs.php" rel="703">Packs</a>
                        </li>


                    </ul>
                </li>
            <?php }elseif(Auth::user()->type =='Cliente'){ ?>
                 <li><a href="resumenes.php" rel="7" ><i class="icon-file-pdf"></i> <?php echo $txt_administracion_administracion ?></a>
                    <ul class="closed">
                        <li>
                            <a href="resumenesc.php" rel="701"><?php echo $txt_administracion_resumenes ?></a>
                        </li>
                        <li>
                            <a href="facturasc.php" rel="702"><?php echo $txt_administracion_facturas ?></a>
                        </li>
                    </ul>
                </li>
            <?php } ?>


            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type == 'Administrador'){ ?>
                <li><a href="mbalance.php" rel="13" ><i class="icon-briefcase"></i> Finance</a>
                    <ul class="closed">
                        <?php if(Auth::user()->type =='SuperUser' ){ ?>
                            <li>
                                <a href="mbalance.php" rel="1301">Balance Mensual</a>
                            </li>
                            <li>
                                <a href="abalance.php" rel="1302">Balance Anual</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="ggastos.php" rel="1303">Gastos Mes</a>
                        </li>
                        <li>
                            <a href="tipos_ggasto.php" rel="1304">Tipos Gastos</a>
                        </li>

                    </ul>
                </li>
            <?php }elseif(Auth::user()->type =='Cliente'){ ?>
                <li><a href="mbalance.php" rel="13" ><i class="icon-briefcase"></i> <?php echo $txt_finance_finance ?></a>
                    <ul class="closed">
                        <li>
                            <a href="mbalancec.php" rel="1301"><?php echo $txt_finance_balance_mensual ?></a>
                        </li>
                        <li>
                            <a href="abalancec.php" rel="1302"><?php echo $txt_finance_balance_anual ?></a>
                        </li>
                    </ul>
                </li>
            <?php } ?>


            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="agentes.php" rel="4" ><i class="icon-user"></i> Staff</a>
                    <ul class="closed">
                        <?php if(Auth::user()->type =='SuperUser'){ ?>
                        <li>
                            <a href="superusers.php" rel="404">Super Users</a>
                        </li>
                        <?php } ?>
                        <?php if(Auth::user()->type =='SuperUser'){ ?>
                        <li>
                            <a href="administradores.php" rel="403">Administradores</a>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="agentes.php" rel="402">Staff</a>
                        </li>
                        <li>
                            <a href="roles.php" rel="401">Roles</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador' || (Auth::user()->type == 'Agente' && Auth::user()->role_id == 1)){ ?>
                <li><a href="#" rel="8"><i class="icon-t-shirt"></i> Ropa</a>
                    <ul class="closed">
                        <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                            <li><a href="stocks.php" rel="801">Stocks</a></li>
                        <?php } ?>
                        <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                            <li><a href="alta_ropa.php" rel="803">Alta Ropa</a></li>
                        <?php } ?>
                        <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                            <li><a href="baja_ropa.php" rel="804">Baja Ropa</a></li>
                        <?php } ?>
                        <li><a href="trasladar.php" rel="805">Trasladar Ropa</a></li>
                        <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                            <li><a href="tipos_ropa.php" rel="802">Tipos Ropa</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>



            <?php if(Auth::user()->type =='SuperUser'){ ?>
                <li><a href="checkins.php" rel="16" ><i class="icon-lock"></i>  Passwords</a>

                    <ul class="closed">
                        <li>
                            <a href="passClientes.php" rel="1601">Clientes</a>
                        </li>
                         <li>
                            <a href="passAdministradores.php" rel="1602">Administradores</a>
                        </li>
                        <li>
                            <a href="passAgentes.php" rel="1603">Agentes</a>
                        </li>
                    </ul>

                </li>
            <?php } ?>


            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="/airbnb_users.php" rel="18" ><img src="/images/icons/airbnb_sidebar_icon.png" class="mini-icon-logo-calendar"> Airbnb</a></li>

            <?php } ?>


            <?php if(Auth::user()->type =='SuperUser' || Auth::user()->type =='Administrador'){ ?>
                <li><a href="/form.php" rel="19" ><i class="icon-list"></i> Form</a></li>

            <?php } ?>


            





            <!--li class=""><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
            <li><a href="charts.php"><i class="icon-graph"></i> Charts</a></li>
            <li><a href="calendar.php"><i class="icon-calendar"></i> Calendar</a></li>
            <li><a href="files.php"><i class="icon-folder-closed"></i> File Manager</a></li>
            <li><a href="table.php"><i class="icon-table"></i> Table</a></li>
            <li>
                <a href="#"><i class="icon-list"></i> Forms</a>
                <ul>
                    <li><a href="form_layouts.php">Layouts</a></li>
                    <li><a href="form_elements.php">Elements</a></li>
                    <li><a href="form_wizard.php">Wizard</a></li>
                </ul>
            </li>
            <li><a href="widgets.php"><i class="icon-cogs"></i> Widgets</a></li>
            <li><a href="typography.php"><i class="icon-font"></i> Typography</a></li>
            <li><a href="grids.php"><i class="icon-th"></i> Grids &amp; Panels</a></li>
            <li><a href="gallery.php"><i class="icon-pictures"></i> Gallery</a></li>
            <li><a href="error.php"><i class="icon-warning-sign"></i> Error Page</a></li>
            <li>
                <a href="icons.php">
                    <i class="icon-pacman"></i>
                    Icons <span class="mws-nav-tooltip">2000+</span>
                </a>
            </li-->
        </ul>
    </div>
</div>
