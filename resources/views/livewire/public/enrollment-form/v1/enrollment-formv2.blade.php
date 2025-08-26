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
                    <h4 class="text-etc-regblue text-uppercase text-center fw-bold">5th English Teaching Congress
                        <br> of the Huetar Norte Region 2025
                    </h4>
                </div>

                <h5 class="text-center text-etc-blue fw-semi-bold text-uppercase mt-4 mb-3">Applicant Form</h5>

                {{-- Instructions --}}
                @if( $current_step == 1 )
                <p class="text-secondary">The information you provide will be kept strictly confidential.
                    <br> <strong>Please pay attention to the writing</strong> <i>(capital letters and accents)</i> and the validity of the information you will provide.
                </p>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 1.</span> General Instructions</h6>

                <div class="text-secondary">
                    <p>Dear Applicant,</p>
                    <p>We are pleased to announce the official opening of the <strong>Call for Proposals</strong> for the <strong>5th English Teaching Congress 2025</strong>. We invite educators, trainers, and professionals in the field of English language teaching to submit proposals for workshops, presentations, or hands-on sessions that provide practical strategies, promote teacher well-being, and inspire classroom innovation.
                        If you have a powerful idea, teaching experience, or classroom strategy that could impact others, we would love to have you as part of this transformative event.
                    </p>
                    <p>The 5th English Teaching Congress of the Huetar Norte Region 2025 will be held in person and will take place on Thursday, November 27,
                        and Friday, November 28 of the current year, from 8:00 a.m. to 4:00 p.m.</p>
                </div>

                <div class="d-flex justify-content-center my-4" style="opacity: .3">
                    <div class="" style="width: 10%; border: dashed 2px grey;"></div>
                </div>

                <div class="question px-2">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">Do you commit to being responsible for punctual attendance at the congress as a participant in the activity?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model="quest1_1" wire:change="changeStopStatus" class="form-check-input" id="quest1-1-s" type="radio" name="quest1_1-s" value="si" />
                            <label class="form-check-label" for="quest1-1-s">Yes</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="quest1_1" wire:change="changeStopStatus" class="form-check-input" id="quest1_1-n" type="radio" name="quest1_1-n" value="no" />
                            <label class="form-check-label" for="quest1-1-n">No</label>
                        </div>
                    </div>
                    @if($stop)
                    <div class="alert alert-danger py-2 px-3" role="alert">You must accept this condition to proceed!</div>
                    @endif
                </div>
                @endif

                {{-- Step #2 --}}
                @if( $current_step == 2 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 2.</span>Applicant Information</h6>
                @livewire('public.enrollment-form.v1.ide-data')

                {{-- item --}}
                <div class="row mb-3">
                    @if( $selected_ide_type == 1 )
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">ID Number</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your ID number" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>The ID number must include all 9 digits.</i></span>
                    @elseif($selected_ide_type == 2)
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Passport Number</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your passport nnumber" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>The passport number must include all digits.</i></span>
                    @elseif($selected_ide_type == 3)
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Residence ID</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your residence ID number" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>The residence ID must include all digits.</i></span>
                    @endif
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div>
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <img class="img-fluid" src="{{ asset('images/ivetc-point.png') }}" style="max-width: 15px">
                                </div>
                                <label class="mt-1 mb-0">Prefix</label>
                            </div>

                            {{-- Opciones de prefijo --}}
                            <div class="form-check">
                                <input wire:model.lazy="prefijo" class="form-check-input" type="radio" value="BACH" id="prefijoBACH">
                                <label class="form-check-label" for="prefijoBACH">BACH</label>
                            </div>

                            <div class="form-check">
                                <input wire:model.lazy="prefijo" class="form-check-input" type="radio" value="LAC" id="prefijoLAC">
                                <label class="form-check-label" for="prefijoLAC">LIC</label>
                            </div>

                            <div class="form-check">
                                <input wire:model.lazy="prefijo" class="form-check-input" type="radio" value="M.A" id="prefijoMA">
                                <label class="form-check-label" for="prefijoMA">M.A</label>
                            </div>

                            <div class="form-check">
                                <input wire:model.lazy="prefijo" class="form-check-input" type="radio" value="MSc" id="prefijoMSc">
                                <label class="form-check-label" for="prefijoMSc">MSc</label>
                            </div>

                            <div class="form-check">
                                <input wire:model.lazy="prefijo" class="form-check-input" type="radio" value="M.Ed" id="prefijoMEd">
                                <label class="form-check-label" for="prefijoMEd">M.Ed</label>
                            </div>

                            @error('prefijo')
                            <div class="position-relative">
                                <small class="text-danger" style="font-size: .8em">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-name">Name</label>
                            </div>
                            <input wire:model.lazy="name" class="form-control form-control-sm" id="user-name" type="text" placeholder="Enter your name" />
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
                                <label class="mt-1 mb-0" for="user-lastname">Lastname</label>
                            </div>
                            <input wire:model.lazy="lastname" class="form-control form-control-sm" id="user-lastname" type="text" placeholder="Enter your last name(s)" />
                            @error('lastname') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-title">Academic Title</label>
                            </div>
                            <input wire:model.lazy="academic_title" class="form-control form-control-sm" id="user-title" type="text" placeholder="Enter the academic title" />
                            @error('title') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-exp">Years of Experience</label>
                            </div>
                            <input wire:model.lazy="exp" class="form-control form-control-sm" id="user-exp" type="text" placeholder="Enter your titles and/or years of experience" />
                            @error('exp') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Country of Residence</label>
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
                            <label class="mt-1 mb-0" for="user-prov">Province</label>
                        </div>
                        <select wire:model.lazy="prov" class="form-select form-select-sm form-control form-control-sm form-control-light">
                            <option value="0">Select</option>
                            @foreach( $province_list as $province )
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('prov') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                            <label class="mt-1 mb-0" for="user-cant">Canton</label>
                        </div>
                        <select wire:model.lazy="cant" class="form-select form-select-sm form-control-light" @if($lockCanton) disabled @endif>
                            <option value="0">Select</option>
                            @foreach( $canton_list as $canton )
                            <option value="{{ $canton->id }}">{{ $canton->name }}</option>
                            @endforeach
                        </select>
                        @error('cant') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                            <label class="mt-1 mb-0" for="user-dist">District</label>
                        </div>
                        <select wire:model.lazy="dist" class="form-select form-control form-select-sm form-control-light" @if($lockDistrict) disabled @endif>
                            <option value="0">Select</option>
                            @foreach( $district_list as $district )
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('dist') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                    </div>
                </div>
                @endif

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-email-pers">E-mail <span class="text-secondary ms-1">(Activo)</span></label>
                            </div>
                            <input wire:model.lazy="email" class="form-control form-control-sm" id="user-email-pers" type="email" placeholder="Enter you email" />
                            @error('email') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-mobile">Phone</label>
                            </div>
                            <input wire:model.lazy="mobile" class="form-control form-control-sm" id="user-mobile" type="text" placeholder="Enter your phone number" />
                            @error('mobile') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                            <span class="small text-muted"><i><span class="text-danger me-1">*</span>Format: ####-####</i></span>
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-inst">Institutional Affiliation (Name)</label>
                            </div>
                            <input wire:model.lazy="institucion" class="form-control form-control-sm" id="user-institucion-pers" type="text" placeholder="Enter the institution you are affiliated with" />
                            @error('institucion') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>

                <!-- {{-- item --}}
                 <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-email-inst">Correo institucional</label>
                            </div>
                            <input wire:model.lazy="email_inst" class="form-control form-control-sm" id="user-email-inst" type="email" placeholder="Ingresa tu correo institucional" />
                            @error('email_inst') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div> -->

                <!-- {{-- item --}}
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
                </div> -->
                @endif

                {{-- Step #3 --}}
                @if( $current_step == 3 )

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <img class="img-fluid" src="{{ asset('images/ivetc-point.png') }}" style="max-width: 15px">
                                </div>
                                <label class="mt-1 mb-0" for="user-presentation">
                                    Is this your first time presenting publicly?
                                </label>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="form-check me-3">
                                    <input wire:model.lazy="user_presentation" class="form-check-input" type="radio" id="presentacion-si" value="si">
                                    <label class="form-check-label" for="presentacion-si">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input wire:model.lazy="user_presentation" class="form-check-input" type="radio" id="presentacion-no" value="no">
                                    <label class="form-check-label" for="presentacion-no">No</label>
                                </div>
                            </div>

                            {{-- item --}}
                            <div class="row mb-3">
                                <div class="col-12 col-md-8 col-lg-7">
                                    <div class="">
                                        <div class="d-flex align-items-start">
                                            <div class="me-2">
                                                <img class="img-fluid" src="{{ asset('images/ivetc-point.png') }}" style="max-width: 15px">
                                            </div>
                                            <label class="mt-1 mb-0" for="user-photo">Please upload a photo of yourself.</label>
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

                            @error('user_presentation')
                            <div class="position-relative">
                                <small class="text-danger" style="font-size: .8em">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                @endif

                {{-- Step #4 --}}
                @if($current_step == 4)
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">
                    <span class="text-etc-darkblue">Section 4.</span> Topics / Content Areas
                </h6>

                <p>Select the content option that best fits your proposal.</p>

                {{-- Grupo 1: Teacher Well-being --}}
                <h6 class="fw-semi-bold mt-3">1.Teacher Well-being: Creating a Healthy Work-Life Balance</h6>

                <div class="ms-4 mt-2">
                    @foreach([
                    '1.1. Teacher Wellness: Physical & Mental Health in Action – Daily strategies to care for body and mind.',
                    '1.2. Burnout Recovery Toolkit: Practical strategies to reignite passion for teaching.',
                    '1.3. Emotional Intelligence in the Classroom: Tools for Teachers to Thrive.',
                    '1.4. Building a Positive Classroom Environment: A Key to Teacher Empowerment.',
                    '1.5. Mindfulness for Educators: Applied techniques to reduce anxiety and improve focus in the classroom.'
                    ] as $key => $item)
                    <div class="form-check mb-2">
                        <input wire:model="teacher_wellbeing" class="form-check-input" type="radio"
                            id="option-1-{{ $key }}" name="unique_option" value="{{ $item }}">
                        <label class="form-check-label" for="option-1-{{ $key }}">{{ $item }}</label>
                    </div>
                    @endforeach
                </div>

                {{-- Grupo 2: Empowering Teachers Through Technology --}}
                <h6 class="fw-semi-bold mt-3">2.Empowering Teachers Through Technology: Digital Tools for Classroom Efficiency</h6>

                <div class="ms-4 mt-2">
                    @foreach([
                    '2.1. AI in Language Teaching: Opportunities and Challenges for Educators',
                    '2.2. Tech-Savvy Teaching: How technology can reduce stress and optimize time.',
                    '2.3. Gamification in the Classroom: Making Learning Fun and Effective',
                    '2.4. Designing Rubrics for ESL Assessment using AI.',
                    '2.5. Work Smarter, Not Harder: Time management and organization to reduce workload.'
                    ] as $key => $item)
                    <div class="form-check mb-2">
                        <input wire:model="teacher_wellbeing" class="form-check-input" type="radio"
                            id="option-2-{{ $key }}" name="unique_option" value="{{ $item }}">
                        <label class="form-check-label" for="option-2-{{ $key }}">{{ $item }}</label>
                    </div>
                    @endforeach
                </div>

                {{-- Grupo 3: Teaching English for Specific Purposes (ESP) --}}
                <h6 class="fw-semi-bold mt-3">3.Teaching English for Specific Purposes (ESP): Adapting Lessons to Meet Student Needs</h6>

                <div class="ms-4 mt-2">
                    @foreach([
                    '3.1. The Power of Storytelling in Language Teaching: Engaging Students Through Narratives.',
                    '3.2. Energizing Lesson Plans: Designing Dynamic Classes that Motivate both Teachers and Students.',
                    '3.3. Flipping the ESL Classroom for Student Autonomy.',
                    '3.4. Tailoring Lessons for Different Fields: Practical Language Skills for Real-World Applications.',
                    '3.5. Outdoor Learning for Teacher Wellness: The Power of Field Trips.'
                    ] as $key => $item)
                    <div class="form-check mb-2">
                        <input wire:model="teacher_wellbeing" class="form-check-input" type="radio"
                            id="option-3-{{ $key }}" name="unique_option" value="{{ $item }}">
                        <label class="form-check-label" for="option-3-{{ $key }}">{{ $item }}</label>
                    </div>
                    @endforeach
                </div>

                @error('teacher_wellbeing')
                <div class="text-danger" style="font-size: .8em">{{ $message }}</div>
                @enderror


                @endif

                {{-- Step #5 --}}
                @if($current_step == 5)
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">
                    <span class="text-etc-darkblue">Section 5.</span> Settings / Audiences
                </h6>

                <p>
                    Please select an option. Consider the environments or audiences your proposal is most closely targeted to, and choose one or more. Which audience(s) would find your session interesting and relevant?
                </p>

                <div class="ms-4 mt-2">
                    @foreach([
                    'Early Childhood (PreK, Very Young Learners) professors',
                    'Primary School (Elementary, Grades 1–6, Young Learners) professors',
                    'Secondary School (Grades 7–12, Teens, Adolescent Learners) professors',
                    'Academic English (Students preparing for and/or studying in undergraduate education) professors',
                    'Adult Education (General and workplace English in e.g., community and technical colleges, and community-based, refugee, vocational, technical, and workplace programs) professors',
                    'Graduate/Post-Graduate Academic and Professional Programs, Including Teacher Education Programs professors',
                    'Private English Language Academies professors',
                    'Tutoring professors'
                    ] as $key => $audience)
                    <div class="form-check mb-2">
                        <input wire:model="selected_audiences" class="form-check-input" type="checkbox" id="audience-{{ $key }}" value="{{ $audience }}">
                        <label class="form-check-label" for="audience-{{ $key }}">{{ $audience }}</label>
                    </div>
                    @endforeach

                    @error('selected_audiences')
                    <div class="text-danger" style="font-size: .8em">{{ $message }}</div>
                    @enderror
                </div>
                @endif

                {{-- Step #6 --}}
                @if($current_step == 6)
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">
                    <span class="text-etc-darkblue">Section 5.</span> Participation type
                </h6>

                <p>
                    Select an option. The congress will be held in person. Currently, technology provides opportunities to participate in hybrid sessions (audience on-site, presenter at a different location).
                </p>

                <div class="ms-4 mt-2 d-flex">
                    <div class="form-check me-4">
                        <input wire:model="participation_type" class="form-check-input" type="radio" id="participation-presencial" value="Presencial">
                        <label class="form-check-label" for="participation-presencial">On-site</label>
                    </div>
                    <div class="form-check">
                        <input wire:model="participation_type" class="form-check-input" type="radio" id="participation-hibrido" value="Híbrido">
                        <label class="form-check-label" for="participation-hibrido">Hybrid</label>
                        <span class="small text-muted"><i><span class="text-danger me-1">*</span>Audience on-site, presenter at a different location</i></span>
                    </div>
                </div>

                @error('participation_type')
                <div class="text-danger" style="font-size: .8em">{{ $message }}</div>
                @enderror
                @endif

                {{-- Step #7 --}}
                @if($current_step == 7)
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">
                    <span class="text-etc-darkblue">Section 6.</span> Session Title, Abstract, and Description
                </h6>

                <p>Please provide the title, abstract, and description of your session. This is the part of the proposal that the organizers will review.</p>

                {{-- Título --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title (max. 10 words)</label>
                    <input type="text" id="title" class="form-control form-control-sm" wire:model.lazy="title" placeholder="Enter you session title">
                    @error('title') <div class="text-danger" style="font-size:.8em">{{ $message }}</div> @enderror
                </div>

                {{-- Abstract --}}
                <div class="mb-3">
                    <label for="abstract" class="form-label fw-bold">Abstract (max. 50 words)</label>
                    <textarea id="abstract" class="form-control form-control-sm" wire:model.lazy="abstract" rows="3" placeholder="Enter your abstract"></textarea>
                    @error('abstract') <div class="text-danger" style="font-size:.8em">{{ $message }}</div> @enderror
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Session Description (max. 300 words)</label>
                    <textarea id="description" class="form-control form-control-sm" wire:model.lazy="description" rows="6" placeholder="Describe your session including its purpose, activities, examples, and educational context."></textarea>
                    @error('description') <div class="text-danger" style="font-size:.8em">{{ $message }}</div> @enderror
                </div>

                {{-- Fuentes citadas --}}
                <div class="mb-3">
                    <label for="sources" class="form-label fw-bold">Cited Sources (optional)</label>
                    <textarea id="sources" class="form-control form-control-sm" wire:model.lazy="sources" rows="3" placeholder="List the cited references here (APA, MLA, etc.)."></textarea>
                    @error('sources') <div class="text-danger" style="font-size:.8em">{{ $message }}</div> @enderror
                </div>

                @endif

                <!-- {{-- Step #4 --}}
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

                @endif

                {{-- Step #5 --}}
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

                    {{-- Botón Back --}}
                    @if( $current_step >= 2 && $current_step <= 7 )
                        <button type="button"
                        wire:click="decreaseStep"
                        class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-lightblue text-white' }}">
                        Back
                        </button>
                        @endif

                        {{-- Botón Send en el último paso --}}
                        @if( $current_step == 7 )
                        <button type="submit"
                            class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-orange text-white' }}">
                            Send
                        </button>
                        @endif

                        {{-- Botón Next --}}
                        @if( $current_step >= 1 && $current_step <= 6 )
                            <button type="button"
                            wire:click="increaseStep"
                            class="btn btn-sm fw-normal px-5 {{ $stop ? 'btn-secondary disabled' : 'bg-etc-regblue text-white' }}">
                            Next
                            </button>
                            @endif
                </div>
            </div>
        </form>

    </div>

</div>