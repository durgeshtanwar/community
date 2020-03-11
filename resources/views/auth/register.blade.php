@extends('layouts.app')

@section('content')
<div class="wrapper" style="background:#DEF3FD">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="register-box 4">
                <div class="register-logo">
                        <a href="#"><b>Shakdwipiya</b> Pariwar</a>
                      </div>
            <div class="card elevation-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Full Name"autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                            <div class="col-md-12">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                            <div class="col-md-12">
                                <input id="family_cast" type="text" class="form-control @error('family_cast') is-invalid @enderror" name="family_cast" value="{{ old('family_cast') }}" required autocomplete="family_cast" placeholder="family cast (like Bhojak, Shandilya etc.)">

                                @error('family_cast')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                            <div class="col-md-12">
                                <input id="family_head" type="text" class="form-control @error('family_head') is-invalid @enderror" name="family_head" value="{{ old('family_head') }}" required autocomplete="family_head" placeholder="Family Head Name (घर के मुखिया का नाम)">

                                @error('family_head')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-3 col-form-label">{{ __('Gender') }}</label>

                            <div class="col-md-9">
                                <select class="form-control" name="gender" aria-placeholder="gender">
                                    <option value="Male"> Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>


                                {{-- <input id="gotra" type="text" class="form-control @error("gotra") is-invalid @enderror" name="gotra" value="{{ old("gotra") }}" required autocomplete="gotra" placeholder="Gotra">

                                @error("gotra")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="form-group row">
                            <label for="gotra" class="col-md-3 col-form-label">{{ __('Gotra') }}</label>

                            <div class="col-md-9">
                                <select class="form-control" name="gotra" aria-placeholder="Gotra">
                                    <option value="NA|NA"> Not Applicable</option>
                                    <option value="Kuvera|Chamunda"> Kuvera</option>
                                    <option value="Mathuria|Sacchiay">Mathuria</option>
                                    <option value="Kataria|Chamunda">Kataria</option>
                                    <option value="Chaparwal|Chamunda">Chaparwal</option>
                                    <option value="Jangla|Sacchiay">Jangla</option>
                                    <option value="Mundhara|Mundhiyad">Mundhara</option>
                                    <option value="Baladh|Peeplaad">Baladh</option>
                                    <option value="Aasiwal|Chamunda">Aasiwal</option>
                                    <option value="Devera|Khinwaj">Devera</option>
                                    <option value="Lllad|Sacchiay">Lllad</option>
                                    <option value="Hatila|Chamunda">Hatila</option>
                                    <option value="Bhartani|Sacchiay">Bhartani</option>
                                    <option value="Sanvlera|Sacchiay">Sanvlera</option>
                                    <option value="Heergota|Chandi">Heergota</option>
                                    <option value="Bheenmaal|Madhyandini">Bheenmaal</option>
                                    <option value="Medatwal Aboti| Sacchiyay">Medatwal Aboti</option>

                                </select>
                            </div>
                                                   

                                @error("gotra")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        <div class="form-group row">
                            <label for="gotra" class="col-md-3 col-form-label">{{ __('Pur') }}</label>

                            <div class="col-md-9">
                                <select class="form-control" name="pur" aria-placeholder="Gotra">
                                    <option value="NA">Not applicable</option>
                                    <option value="उरवार">उरवार</option>
                                    <option value="मखापवार">मखापवार</option>
                                    <option value="देवकुलियार">देवकुलियार</option>
                                    <option value="पडरीयार">पडरीयार</option>
                                    <option value="अदइयार">अदइयार</option>
                                    <option value="पवइयार">पवइयार</option>
                                    <option value="क्षत्रवार">क्षत्रवार</option>
                                    <option value="जम्मुवार">जम्मुवार</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="खंटवार">खंटवार</option>
                                    <option value="केरियार">केरियार</option>
                                    <option value="छेरियार">छेरियार</option>
                                    <option value="कुरईचियार">कुरईचियार</option>
                                    <option value="भलुनियार">भलुनियार</option>
                                    <option value="डुमरियार">डुमरियार</option>
                                    <option value="बाड़वार">बाड़वार</option>
                                    <option value="सरइयार">सरइयार</option>
                                    <option value="योतियार">योतियार</option>
                                    <option value="शिकरौरियार">शिकरौरियार</option>
                                    <option value="मोलियार">मोलियार</option>
                                    <option value="ऐआर">ऐआर</option>
                                    <option value="रहदौलीयार">रहदौलीयार</option>
                                    <option value="अवधियार">अवधियार</option>
                                    <option value="पुतियार">पुतियार</option>
                                    <option value="उल्लार्क">उल्लार्क</option>
                                    <option value="लोलार्क">लोलार्क</option>
                                    <option value="बालार्क">बालार्क</option>
                                    <option value="कोणार्क">कोणार्क</option>
                                    <option value="पुण्डार्क">पुण्डार्क</option>
                                    <option value="चारणार्क">चारणार्क</option>
                                    <option value="मार्कंडेय">मार्कंडेय</option>
                                    <option value="देवडीहा">देवडीहा</option>
                                    <option value="गुन्सइयाँ">गुन्सइयाँ</option>
                                    <option value="महुरसिया">महुरसिया</option>
                                    <option value="डूमरौरी">डूमरौरी</option>
                                    <option value="सपहा">सपहा</option>
                                    <option value="गुलसैया">गुलसैया</option>
                                    <option value="मल्लौर्क">मल्लौर्क</option>
                                    <option value="हरहसिया">हरहसिया</option>
                                    <option value="देवलसिया">देवलसिया</option>
                                    <option value="वरुणार्क">वरुणार्क</option>
                                    <option value="कुण्डार्क">कुण्डार्क</option>
                                    <option value="विलसैया">विलसैया</option>
                                    <option value="श्वेतभद्र">श्वेतभद्र</option>
                                    <option value="पंचकंठी">पंचकंठी</option>
                                    <option value="डूडरियार">डूडरियार</option>
                                    <option value="पठकौलियार">पठकौलियार</option>
                                    <option value="पंचहाय">पंचहाय</option>
                                    <option value="सियरी">सियरी</option>
                                    <option value="कुकरौंधा">कुकरौंधा</option>
                                    <option value="मोरियार">मोरियार</option>
                                    <option value="मिहिर/मिहीमगौरियार">मिहिर/मिहीमगौरियार</option>
                                    <option value="वेरियार">वेरियार</option>
                                    <option value="मेहोशवार">मेहोशवार</option>
                                    <option value="सौरियार">सौरियार</option>
                                    <option value="पुनरखिया">पुनरखिया</option>
                                    <option value="देवहाय">देवहाय</option>
                                    <option value="शुंडार्क">शुंडार्क</option>
                                    <option value="यत्थय">यत्थय</option>
                                    <option value="ठकुर मेराँव">ठकुर मेराँव</option>
                                    <option value="डिहिक">डिहिक</option>
                                    <option value="भड़रियार">भड़रियार</option>
                                    <option value="चंडरोह">चंडरोह</option>
                                    <option value="खजुरहा">खजुरहा</option>
                                    <option value="पट्टिश">पट्टिश</option>
                                    <option value="काझ">काझ</option>
                                    <option value="कपिश्य">कपिश्य</option>
                                    <option value="परसन">परसन</option>
                                    <option value="खंडसूपक">खंडसूपक</option>
                                    <option value="बालिबाघ">बालिबाघ</option>
                                    <option value="पिपरोहा">पिपरोहा</option>
                                    <option value="बड़सापी">बड़सापी</option>
                                </select>
                            </div>
                                       

                                @error("pur")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

   
                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
    
                                <div class="col-md-12">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" autocomplete="code" placeholder="Invitation Code">
    
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                           
                        </div>
                        <div class="form-group-row text-center mt-3">
                            <p>Already a Member Click <a href="/login">Here</a> to login</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

   
  </div>
</div>
@endsection
