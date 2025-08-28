<div>
    {{-- enrollment form --}}

    <div class="card shadow position-relative">

        <div wire:loading class="position-absolute bg-light" style="width: 100%; height: 100%; z-index: 1; background-color: rgba(250,250,250,.8)">
            <div class="d-flex justify-content-center align-items-center">
                <div class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center my-1 py-2 px-3">
            <div class="d-flex justify-content-between align-items-center" style="width: 100%; max-width: 80px;">
                <div class="{{ $current_step >= 1 ? 'bg-warning' : 'bg-soft-secondary' }}" style="border-radius: 50%; width: 7px; height: 7px"></div>
                <div class="{{ $current_step >= 2 ? 'bg-etc-lightblue' : 'bg-soft-secondary' }}" style="border-radius: 50%; width: 7px; height: 7px"></div>
                <div class="{{ $current_step >= 3 ? 'bg-etc-lightblue' : 'bg-soft-secondary' }}" style="border-radius: 50%; width: 7px; height: 7px"></div>
                <div class="{{ $current_step >= 4 ? 'bg-etc-lightblue' : 'bg-soft-secondary' }}" style="border-radius: 50%; width: 7px; height: 7px"></div>
                <div class="{{ $current_step >= 5 ? 'bg-info' : 'bg-soft-secondary' }}" style="border-radius: 50%; width: 7px; height: 7px"></div>
            </div>
        </div>

        <form wire:submit.prevent="processData" autocomplete="off">
            <div class="card-body px-lg-4 fs--1" style="line-height: 1.8">
                <div class="mb-3">
                    <h4 class="text-etc-regblue text-uppercase text-center fw-bold">V Congreso de la Enseñanza del Inglés
                        <br> de la Región Huetar Norte 2025
                    </h4>
                </div>

                <h5 class="text-center text-etc-blue fw-semi-bold text-uppercase mt-4 mb-3">Formulario de inscripción</h5>

                {{-- Instructions --}}
                @if( $current_step == 1 )

                <p class="text-secondary">La información que usted brinde se mantendrá en completa confidencialidad.
                    <br> <strong>Favor prestar atención en la redacción</strong> <i>(mayúsculas y tildes)</i> y la validez de la información que
                    usted brindará.
                </p>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 1.</span> Instrucciones generales</h6>

                <div class="text-secondary">
                    <p>Estimada persona participante,</p>
                    <p>El V Congreso de la Enseñanza del Inglés de la Región Huetar Norte 2025 será presencial,
                        se llevará a cabo los dias jueves 27 de noviembre y viernes 28 de noviembre del año en curso de 8:00 a.m. a 4:00 p.
                        m.</p>
                    <!-- <p>Se otorgará un certificado de participación a aquellas personas que así lo soliciten y paguen el
                        monto de 5 000 colones, debido a que solo se reconoce para carrera profesional cuando el
                        monto es sufragado por la persona interesada <i>(según resolución DG-139-2019, Artículo 8,
                            inciso b.)</i>. Solo se certificará a aquellas personas que completen <strong>20 horas de participación </strong>
                    </p> -->
                </div>

                <div class="d-flex justify-content-center my-4" style="opacity: .3">
                    <div class="" style="width: 10%; border: dashed 2px grey;"></div>
                </div>

                <div class="question px-2">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">¿Se compromete a atender de manera presencial a las diferentes actividades establecidas para este congreso?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model="quest1_1" wire:change="changeStopStatus" class="form-check-input" id="quest1-1-s" type="radio" name="quest1_1-s" value="si" />
                            <label class="form-check-label" for="quest1-1-s">Si</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="quest1_1" wire:change="changeStopStatus" class="form-check-input" id="quest1_1-n" type="radio" name="quest1_1-n" value="no" />
                            <label class="form-check-label" for="quest1-1-n">No</label>
                        </div>
                    </div>
                    @if($stop)
                    <div class="alert alert-danger py-2 px-3" role="alert">¡Es necesario aceptar esta condición para continuar!</div>
                    @endif
                </div>
                @endif

                {{-- Step #2 --}}
                @if( $current_step == 2 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 2.</span> Datos personales</h6>
                @livewire('public.enrollment-form.v1.ide-data')

                {{-- item --}}
                <div class="row mb-3">
                    @if( $selected_ide_type == 1 )
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Número de cédula</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Ingresa tu número de cédula" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>El número de cédula debe incluir los 9 dígitos.</i></span>
                    @elseif($selected_ide_type == 2)
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Número de pasaporte</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Ingresa tu número de pasaporte" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>El número de pasaporte debe incluir todos los dígitos.</i></span>
                    @elseif($selected_ide_type == 3)
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Cédula de residencia</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Ingresa tu número de residencia" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>El número de residencia debe incluir todos los dígitos.</i></span>
                    @endif
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-name">Nombre</label>
                            </div>
                            <input wire:model.lazy="name" class="form-control form-control-sm" id="user-name" type="text" placeholder="Ingresa tu nombre" />
                            @error('name') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-lastname">Apellidos</label>
                            </div>
                            <input wire:model.lazy="lastname" class="form-control form-control-sm" id="user-lastname" type="text" placeholder="Ingrese sus apellidos" />
                            @error('lastname') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                @livewire('public.enrollment-form.v1.gender-data', [ 'selected_gender_id' => $selected_gender_id ])

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-mobile">Teléfono celular</label>
                            </div>
                            <input wire:model.lazy="mobile" class="form-control form-control-sm" id="user-mobile" type="text" placeholder="Ingresa tu teléfono" />
                            @error('mobile') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                            <span class="small text-muted"><i><span class="text-danger me-1">*</span>Formato: ####-####</i></span>
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-email-pers">Correo personal <span class="text-secondary ms-1">(Activo)</span></label>
                            </div>
                            <input wire:model.lazy="email" class="form-control form-control-sm" id="user-email-pers" type="email" placeholder="Ingresa tu correo personal" />
                            @error('email') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">País de residencia</label>
                            </div>
                            <select wire:model="country" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="AF">Afganist&#225;n</option>
                                <option value="AL">Albania</option>
                                <option value="DE">Alemania</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguila</option>
                                <option value="AQ">Ant&#225;rtida</option>
                                <option value="AG">Antigua y Barbuda</option>
                                <option value="AN">Antillas Neerlandesas</option>
                                <option value="SA">Arabia Saud&#237;</option>
                                <option value="DZ">Argelia</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahr&#233;in</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">B&#233;lgica</option>
                                <option value="BZ">Belice</option>
                                <option value="BJ">Ben&#237;n</option>
                                <option value="BM">Bermudas</option>
                                <option value="BY">Bielorrusia</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia y Herzegovina</option>
                                <option value="BW">Botsuana</option>
                                <option value="BR">Brasil</option>
                                <option value="BN">Brun&#233;i Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="BT">But&#225;n</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="KH">Camboya</option>
                                <option value="CM">Camer&#250;n</option>
                                <option value="CA">Canad&#225;</option>
                                <option value="BQ">Caribe Neerland&#233;s</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CY">Chipre</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoras</option>
                                <option value="CG">Congo</option>
                                <option value="CI">Costa de Marfil</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croacia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curazao</option>
                                <option value="DK">Dinamarca</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="EC">Ecuador</option>
                                <option value="US">EE.UU.</option>
                                <option value="EG">Egipto</option>
                                <option value="SV">El Salvador</option>
                                <option value="ER">Eritrea</option>
                                <option value="SK">Eslovaquia</option>
                                <option value="SI">Eslovenia</option>
                                <option value="ES">Espa&#241;a</option>
                                <option value="PH">Filipinas</option>
                                <option value="FI">Finlandia</option>
                                <option value="FR">Francia</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Granada</option>
                                <option value="GR">Grecia</option>
                                <option value="GL">Groenlandia</option>
                                <option value="GP">Guadalupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GF">Guayana Francesa</option>
                                <option value="GN">Guinea</option>
                                <option value="GQ">Guinea Ecuatorial</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Hait&#237;</option>
                                <option value="HN">Honduras</option>
                                <option value="HU">Hungr&#237;a</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IQ">Irak</option>
                                <option value="IE">Irlanda</option>
                                <option value="IS">Islandia</option>
                                <option value="KY">Islas Caim&#225;n</option>
                                <option value="CK">Islas Cook</option>
                                <option value="FO">Islas Feroe</option>
                                <option value="FK">Islas Malvinas</option>
                                <option value="MP">Islas Marianas del Norte</option>
                                <option value="MH">Islas Marshall</option>
                                <option value="SB">Islas Salom&#243;n</option>
                                <option value="VG">Islas V&#237;rgenes Brit&#225;nicas</option>
                                <option value="VI">Islas V&#237;rgenes de los Estados Unidos</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italia</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Jap&#243;n</option>
                                <option value="JO">Jordania</option>
                                <option value="KZ">Kazajist&#225;n</option>
                                <option value="KE">Kenia</option>
                                <option value="KG">Kirguizist&#225;n</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesoto</option>
                                <option value="LV">Letonia</option>
                                <option value="LB">L&#237;bano</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libia</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lituania</option>
                                <option value="LU">Luxemburgo</option>
                                <option value="MO">Macao, China</option>
                                <option value="MK">Macedonia</option>
                                <option value="MG">Madagascar</option>
                                <option value="MY">Malasia</option>
                                <option value="MW">Malawi</option>
                                <option value="MV">Maldivas</option>
                                <option value="ML">Mal&#237;</option>
                                <option value="MT">Malta</option>
                                <option value="MA">Marruecos</option>
                                <option value="MQ">Martinica</option>
                                <option value="MU">Mauricio</option>
                                <option value="MR">Mauritania</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">M&#233;xico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldavia</option>
                                <option value="MC">M&#243;naco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">N&#237;ger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NO">Noruega</option>
                                <option value="NC">Nueva Caledonia</option>
                                <option value="NZ">Nueva Zelanda</option>
                                <option value="OM">Om&#225;n</option>
                                <option value="NL">Pa&#237;ses Bajos</option>
                                <option value="PK">Pakist&#225;n</option>
                                <option value="PW">Palaos</option>
                                <option value="PS">Palestina</option>
                                <option value="PA">Panam&#225;</option>
                                <option value="PG">Pap&#250;a Nueva Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Per&#250;</option>
                                <option value="PF">Polinesia Francesa</option>
                                <option value="PL">Polonia</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="GB">Reino Unido</option>
                                <option value="CF">Rep&#250;blica Centroafricana</option>
                                <option value="CZ">Rep&#250;blica Checa</option>
                                <option value="AZ">Rep&#250;blica de Azerbaiy&#225;n</option>
                                <option value="CD">Rep&#250;blica Democr&#225;tica del Congo</option>
                                <option selected="selected" value="DO">Rep&#250;blica Dominicana</option>
                                <option value="GA">Rep&#250;blica Gabonesa</option>
                                <option value="RE">Reuni&#243;n</option>
                                <option value="RW">Ruanda</option>
                                <option value="RO">Ruman&#237;a</option>
                                <option value="RU">Rusia</option>
                                <option value="WS">Samoa</option>
                                <option value="AS">Samoa Americana</option>
                                <option value="KN">San Crist&#243;bal y Nieves</option>
                                <option value="SM">San Marino</option>
                                <option value="PM">San Pedro y Miquel&#243;n</option>
                                <option value="VC">San Vicente y las Granadinas</option>
                                <option value="SH">Santa Elena</option>
                                <option value="LC">Santa Luc&#237;a</option>
                                <option value="ST">Santo Tom&#233; y Pr&#237;ncipe</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leona</option>
                                <option value="SG">Singapur</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SY">Siria</option>
                                <option value="SO">Somalia</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SZ">Suazilandia</option>
                                <option value="ZA">Sud&#225;frica</option>
                                <option value="SD">Sud&#225;n</option>
                                <option value="SS">Sud&#225;n del Sur</option>
                                <option value="SE">Suecia</option>
                                <option value="CH">Suiza</option>
                                <option value="SR">Surinam</option>
                                <option value="TH">Tailandia</option>
                                <option value="TW">Taiw&#225;n</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TJ">Tayikist&#225;n</option>
                                <option value="TL">Timor Oriental</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad y Tobago</option>
                                <option value="TN">T&#250;nez</option>
                                <option value="TC">Turcas y Caicos</option>
                                <option value="TM">Turkmenist&#225;n</option>
                                <option value="TR">Turqu&#237;a</option>
                                <option value="TV">Tuvalu</option>
                                <option value="AE">UAE</option>
                                <option value="UA">Ucrania</option>
                                <option value="UG">Uganda</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekist&#225;n</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vaticano</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="WF">Wallis y Futuna</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabue</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- item --}}
                @if( $country == 'CR' )
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                            <label class="mt-1 mb-0" for="user-prov">Provincia</label>
                        </div>
                        <select wire:model.lazy="prov" class="form-select form-select-sm form-control form-control-sm form-control-light">
                            <option value="0">Seleccionar</option>
                            @foreach( $province_list as $province )
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('prov') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                            <label class="mt-1 mb-0" for="user-cant">Cantón</label>
                        </div>
                        <select wire:model.lazy="cant" class="form-select form-select-sm form-control-light" @if($lockCanton) disabled @endif>
                            <option value="0">Seleccionar</option>
                            @foreach( $canton_list as $canton )
                            <option value="{{ $canton->id }}">{{ $canton->name }}</option>
                            @endforeach
                        </select>
                        @error('cant') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                            <label class="mt-1 mb-0" for="user-dist">Distrito</label>
                        </div>
                        <select wire:model.lazy="dist" class="form-select form-control form-select-sm form-control-light" @if($lockDistrict) disabled @endif>
                            <option value="0">Seleccionar</option>
                            @foreach( $district_list as $district )
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('dist') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                </div>
                @endif

                {{-- item --}}
                @livewire('public.enrollment-form.v1.professional-educational-level', [ 'selected_educational_id' => $selected_educational_id] )

                {{-- item --}}
                <div class="question">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">¿Labora usted para el Ministerio de Educación Pública?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model.lazy="mep" class="form-check-input" id="quest2-15-y" type="radio" name="quest2-15-y" value="si" />
                            <label class="form-check-label" for="quest2-15-y">Si</label>
                        </div>
                        <div class="form-check">
                            <input wire:model.lazy="mep" class="form-check-input" id="quest2-15-n" type="radio" name="quest2-15-n" value="no" />
                            <label class="form-check-label" for="quest2-15-n">No</label>
                        </div>
                    </div>
                </div>

                @endif

                {{-- Step #3 --}}
                @if( $current_step == 3 )
                @if( $mep == 'si' )
                {{-- MEP --}}
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 3.</span> Información de docentes del Ministerio de Educación Pública</h6>
                {{-- item --}}
                @livewire('public.enrollment-form.v1.appointment-data', ['mep' => 'si'])

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-service-years">Años de servicio</label>
                            </div>
                            <input wire:model.lazy="service_years" class="form-control form-control-sm" id="user-service-years" type="text" placeholder="Ingresa la cantidad de años" />
                            @error('service_years') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                @livewire('public.enrollment-form.v1.region-data', ['selected_region_id' => $selected_region_id])


                @if( $selected_region_id == 5 )
                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-institution">Nombre de la región</label>
                            </div>
                            <input wire:model.lazy="other_region" class="form-control form-control-sm" id="user-custom-region" type="text" placeholder="Ingresa el nombre de la región" />
                            @error('other_region') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
                @endif

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-institution">Centro educativo donde labora</label>
                            </div>
                            <input wire:model.lazy="institution" class="form-control form-control-sm" id="user-institution" type="text" placeholder="Ingresa el nombre de la institución" />
                            @error('institution') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-inst-location">Ingrese la ubicación de la institución</label>
                            </div>
                            <input wire:model.lazy="inst_address" class="form-control form-control-sm" id="user-inst-location" type="text" placeholder="Ingresa el nombre de la institución" />
                            @error('inst_address') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
                @else
                {{-- PRIVADO --}}
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 3.</span>Información de docentes de otras entidades educativas diferentes al Ministerio de Educación Pública o entidades privadas</h6>
                {{-- item --}}
                @livewire('public.enrollment-form.v1.appointment-data', ['mep' => 'no'])

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-service-years">Años de servicio</label>
                            </div>
                            <input wire:model.lazy="service_years" class="form-control form-control-sm" id="user-service-years" type="text" placeholder="Ingresa la cantidad de años" />
                            @error('service_years') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-institution">Centro educativo donde labora</label>
                            </div>
                            <input wire:model.lazy="institution" class="form-control form-control-sm" id="user-institution" type="text" placeholder="Ingresa el nombre de la institución" />
                            @error('institution') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-inst-location">Ingrese la ubicación de la institución</label>
                            </div>
                            <input wire:model.lazy="inst_address" class="form-control form-control-sm" id="user-inst-location" type="text" placeholder="Ingresa el nombre de la institución" />
                            @error('inst_address') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
                @endif

                @endif



                {{-- Step #4 --}}
                @if( $current_step == 4 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 4.</span> Permisos</h6>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">Consentimiento informado de uso de imagen</h6>

                <p>Doy consentimiento para que se realicen tomas de fotografías y grabaciones de texto y
                    video de mi persona durante las sesiones presenciales. Entiendo que estas
                    imágenes serán utilizadas únicamente para publicaciones o comunicaciones académicas
                    en redes sociales y otros medios.</p>

                {{-- item --}}
                <div class="question">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">¿Da su consentimiento para el uso de imagen y grabaciones?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model="quest4_1" wire:change="changeStopStatus" class="form-check-input" id="quest4_1-s" type="radio" name="quest4_1-s" value="si" />
                            <label class="form-check-label" for="quest4_1-s">Si</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="quest4_1" wire:change="changeStopStatus" class="form-check-input" id="quest4_1-n" type="radio" name="quest4_1-n" value="no" />
                            <label class="form-check-label" for="quest4_1-n">No</label>
                        </div>
                    </div>
                    @if($stop)
                    <div class="alert alert-danger py-2 px-3" role="alert">¡Es necesario aceptar esta condición para continuar!</div>
                    @endif
                </div>
                 {{-- item --}}
                            <div class="row mb-3">
                                <div class="col-12 col-md-8 col-lg-7">
                                    <div class="">
                                        <div class="d-flex align-items-start">
                                            <div class="me-2">
                                                <img class="img-fluid" src="{{ asset('images/ivetc-point.png') }}" style="max-width: 15px">
                                            </div>
                                            <label class="mt-1 mb-0" for="user-photo">Adjunte la imagen del comprobante de pago.</label>
                                        </div>

                                        <input wire:model="photo" class="form-control form-control-sm" id="user-photo" type="file" accept="image/*" />

                                        @if ($photo)
                                        <div class="mt-2">
                                            <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" style="max-width: 150px">
                                        </div>
                                        @endif

                                        @error('photo')
                                        <div class="position-relative">
                                            <small class="text-danger" style="font-size: .8em">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                @endif

                <!-- {{-- Step #5 --}}
                @if( $current_step == 5 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Sección 5.</span> Certificado de participación</h6>

                <p>Si después de haber cumplido 20 horas de participación, y desea obtener un certificado de participación digital, debe cancelar el monto de 5 000 colones, cuyo sistema de pago será habilitado de forma oportuna en la plataforma del congreso. </p>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">Horas de participación</h6>

                <p>Solo se certificará a aquellas personas que completen <b>20 horas de participación</b>.</p>

                {{-- item --}}
                <div class="question">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">¿Desea obtener el certificado de participación digital?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model="quest5_1" class="form-check-input" id="quest5_1-s" type="radio" name="quest5_1-s" value="si" />
                            <label class="form-check-label" for="quest5_1-s">Si</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="quest5_1" class="form-check-input" id="quest5_1-n" type="radio" name="quest5_1-n" value="no" />
                            <label class="form-check-label" for="quest5_1-n">No</label>
                        </div>
                    </div>
                </div>

                @endif -->

                {{-- Actions --}}
                <hr class="mt-4">
                <div class="d-flex {{ $current_step == 1 ? 'justify-content-end' : 'justify-content-between'}}">
                    @if( $current_step == 2 || $current_step == 3 || $current_step == 4)
                    <a wire:click="decreaseStep" class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-lightblue text-white' }}">Regresar</a>
                    @if( $current_step == 4 )
                    <button type="submit" class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-orange text-white' }}">Enviar</button>
                    @endif
                    @endif
                    @if( $current_step == 1 || $current_step == 2 || $current_step == 3)
                    <a wire:click="increaseStep" class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-regblue text-white' }}">Siguiente</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

</div>