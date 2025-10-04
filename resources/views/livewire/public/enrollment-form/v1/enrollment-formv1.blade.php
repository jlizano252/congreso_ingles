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
                    <h4 class="text-etc-regblue text-uppercase text-center fw-bold">5th Congress on the Teaching of English
                        <br> of the Northern Huetar Region 2025
                    </h4>
                </div>

                <h5 class="text-center text-etc-blue fw-semi-bold text-uppercase mt-4 mb-3">Registration Form</h5>

                {{-- Instructions --}}
                @if( $current_step == 1 )

                <p class="text-secondary">The information you provide will be kept completely confidential.
                    <br> <strong>Please pay attention to spelling and capitalization</strong>
                    <i>(uppercase letters and accents)</i> and ensure the accuracy of the information you provide.
                </p>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 1.</span> General Instructions</h6>

                <div class="text-secondary">
                    <p>Dear Participant,</p>
                    <p>The 5th English Teaching Congress of the Northern Huetar Region 2025 will be held in person on Thursday, November 27th, and Friday,
                        November 28th, from 8:00 a.m. to 4:00 p.m.</p>
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
                        <p class="mb-0">Do you commit to attending the different activities scheduled for this congress in person?</p>
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
                    <div class="alert alert-danger py-2 px-3" role="alert">You must accept this condition to continue!</div>
                    @endif
                </div>
                @endif

                {{-- Step #2 --}}
                @if( $current_step == 2 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 2.</span> Personal Data</h6>
                @livewire('public.enrollment-form.v1.ide-data')

                {{-- item --}}
                <div class="row mb-3">
                    @if( $selected_ide_type == 1 )
                    <div class="col-12 col-md-8 col-lg-6 col-xxl-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">IDE Number</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your ID number" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>The ID number must include all 9 digits..</i></span>
                    @elseif($selected_ide_type == 2)
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-ide">Passport Number</label>
                            </div>
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your Passport number" />
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
                            <input wire:model.lazy="ide" class="form-control form-control-sm" id="user-ide-type" type="text" placeholder="Enter your Residence number" />
                            @error('ide') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                    <span class="small text-muted"><i><span class="text-danger me-1">*</span>The residence number must include all digits.</i></span>
                    @endif
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
                                <label class="mt-1 mb-0" for="user-lastname">Lastnames</label>
                            </div>
                            <input wire:model.lazy="lastname" class="form-control form-control-sm" id="user-lastname" type="text" placeholder="Enter your lastnames" />
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
                                <label class="mt-1 mb-0" for="user-mobile">Phone number</label>
                            </div>
                            <input wire:model.lazy="mobile" class="form-control form-control-sm" id="user-mobile" type="text" placeholder="Enter your phone number" />
                            @error('mobile') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                            <span class="small text-muted"><i><span class="text-danger me-1">*</span>Format: +### ####-####</i></span>
                        </div>
                    </div>
                </div>

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-7">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-email-pers">Personal Email <span class="text-secondary ms-1">(Activo)</span></label>
                            </div>
                            <input wire:model.lazy="email" class="form-control form-control-sm" id="user-email-pers" type="email" placeholder="Enter your personal email" />
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
                                <label class="mt-1 mb-0" for="user-ide">Residence Country</label>
                            </div>
                            <select wire:model="country" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="DE">Germany</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="DZ">Algeria</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BY">Belarus</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brazil</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="BT">Bhutan</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="BQ">Caribbean Netherlands</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CY">Cyprus</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curacao</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="EC">Ecuador</option>
                                <option value="US">USA</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="ER">Eritrea</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="ES">Spain</option>
                                <option value="PH">Philippines</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Grenada</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GF">French Guiana</option>
                                <option value="GN">Guinea</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HN">Honduras</option>
                                <option value="HU">Hungary</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IS">Iceland</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CK">Cook Islands</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FK">Falkland Islands</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="VG">British Virgin Islands</option>
                                <option value="VI">U.S. Virgin Islands</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesotho</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao, China</option>
                                <option value="MK">North Macedonia</option>
                                <option value="MG">Madagascar</option>
                                <option value="MY">Malaysia</option>
                                <option value="MW">Malawi</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MA">Morocco</option>
                                <option value="MQ">Martinique</option>
                                <option value="MU">Mauritius</option>
                                <option value="MR">Mauritania</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NO">Norway</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="OM">Oman</option>
                                <option value="NL">Netherlands</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestine</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PF">French Polynesia</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="GB">United Kingdom</option>
                                <option value="CF">Central African Republic</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="CD">Democratic Republic of the Congo</option>
                                <option selected="selected" value="DO">Dominican Republic</option>
                                <option value="GA">Gabon</option>
                                <option value="RE">Reunion</option>
                                <option value="RW">Rwanda</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="WS">Samoa</option>
                                <option value="AS">American Samoa</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="SM">San Marino</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="SH">Saint Helena</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SY">Syria</option>
                                <option value="SO">Somalia</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SZ">Eswatini</option>
                                <option value="ZA">South Africa</option>
                                <option value="SD">Sudan</option>
                                <option value="SS">South Sudan</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SR">Suriname</option>
                                <option value="TH">Thailand</option>
                                <option value="TW">Taiwan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TR">Turkey</option>
                                <option value="TV">Tuvalu</option>
                                <option value="AE">UAE</option>
                                <option value="UA">Ukraine</option>
                                <option value="UG">Uganda</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
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
                @livewire('public.enrollment-form.v1.professional-educational-level', [ 'selected_educational_id' => $selected_educational_id] )

                {{-- item --}}
                <div class="question">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">Do you work for the Ministry of Public Education?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model.lazy="mep" class="form-check-input" id="quest2-15-y" type="radio" name="quest2-15-y" value="si" />
                            <label class="form-check-label" for="quest2-15-y">Yes</label>
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
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 3.</span> Information about Public Education Ministry Teachers</h6>
                {{-- item --}}
                @livewire('public.enrollment-form.v1.appointment-data', ['mep' => 'yes'])

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-service-years">Years of service</label>
                            </div>
                            <input wire:model.lazy="service_years" class="form-control form-control-sm" id="user-service-years" type="text" placeholder="Enter the number of years" />
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
                                <label class="mt-1 mb-0" for="user-institution">Region Name</label>
                            </div>
                            <input wire:model.lazy="other_region" class="form-control form-control-sm" id="user-custom-region" type="text" placeholder="Enter the region name" />
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
                                <label class="mt-1 mb-0" for="user-institution">Educational institution where you work</label>
                            </div>
                            <input wire:model.lazy="institution" class="form-control form-control-sm" id="user-institution" type="text" placeholder="Enter the institution name" />
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
                                <label class="mt-1 mb-0" for="user-inst-location">Enter the location of the institution</label>
                            </div>
                            <input wire:model.lazy="inst_address" class="form-control form-control-sm" id="user-inst-location" type="text" placeholder="Enter the location of the institution" />
                            @error('inst_address') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
                @else
                {{-- PRIVADO --}}
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 3.</span>Information of teachers from other educational institutions different from the Ministry of Public Education or private entities</h6>
                {{-- item --}}
                @livewire('public.enrollment-form.v1.appointment-data', ['mep' => 'no'])

                {{-- item --}}
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="">
                            <div class="d-flex align-items-start">
                                <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                                <label class="mt-1 mb-0" for="user-service-years">Years of service</label>
                            </div>
                            <input wire:model.lazy="service_years" class="form-control form-control-sm" id="user-service-years" type="text" placeholder="Enter the number of years" />
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
                                <label class="mt-1 mb-0" for="user-institution">Educational institution where you work</label>
                            </div>
                            <input wire:model.lazy="institution" class="form-control form-control-sm" id="user-institution" type="text" placeholder="Enter the name of the institution" />
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
                                <label class="mt-1 mb-0" for="user-inst-location">Enter the name of the institution.</label>
                            </div>
                            <input wire:model.lazy="inst_address" class="form-control form-control-sm" id="user-inst-location" type="text" placeholder="Enter the name of the institution." />
                            @error('inst_address') <div class="position-relative"><small class="text-danger" style="font-size: .8em">{{ $message }}</small></div> @enderror
                        </div>
                    </div>
                </div>
                @endif

                @endif



                {{-- Step #4 --}}
                @if( $current_step == 4 )
                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3"><span class="text-etc-darkblue">Section 4.</span> Permissions</h6>

                <h6 class="fw-semi-bold text-etc-lightblue mt-4 mb-3">Informed consent for image use</h6>

                <p>I give my consent for photographs and text/video recordings of me to be taken during the in-person sessions.
                    I understand that these images will be used exclusively for
                    academic publications or communications on social media and other media outlets.</p>

                {{-- item --}}
                <div class="question">
                    <div class="d-flex align-items-start">
                        <div class="me-2"><img class="img-fluid" src="{{asset('images/ivetc-point.png')}}" style="max-width: 15px"></div>
                        <p class="mb-0">Do you give your consent for the use of your image and recordings?</p>
                    </div>
                    <div class="ms-4 mt-3 d-flex">
                        <div class="form-check me-5">
                            <input wire:model="quest4_1" wire:change="changeStopStatus" class="form-check-input" id="quest4_1-s" type="radio" name="quest4_1-s" value="si" />
                            <label class="form-check-label" for="quest4_1-s">Yes</label>
                        </div>
                        <div class="form-check">
                            <input wire:model="quest4_1" wire:change="changeStopStatus" class="form-check-input" id="quest4_1-n" type="radio" name="quest4_1-n" value="no" />
                            <label class="form-check-label" for="quest4_1-n">No</label>
                        </div>
                    </div>
                    @if($stop)
                    <div class="alert alert-danger py-2 px-3" role="alert">It is necessary to accept this condition to continue!</div>
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
                                <label class="mt-1 mb-0" for="user-photo">Attach the image of the payment receipt.</label>
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