@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Contact
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.update", [$client->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($client) ? $client->date : '') }}" >
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                    <p class="helper-block">
                    </p>

                </div>
                <div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control select1" >
                        <option value="" {{$client->status == '' ? 'selected' : ''}}></option>
                        <option value="No contact" {{$client->status == 'No contact' ? 'selected' : ''}}>No Contact</option>
                        <option value="RECALL" {{$client->status == 'RECALL' ? 'selected' : ''}}>RECALL</option>
                        <option value="Call 1" {{$client->status == 'Call 1' ? 'selected' : ''}}>Call 1</option>
                        <option value="Call 2" {{$client->status == 'Call 2' ? 'selected' : ''}}>Call 2</option>
                        <option value="Call 3" {{$client->status == 'Call 3' ? 'selected' : ''}}>Call 3</option>
                        <option value="Undecided" {{$client->status == 'Undecided' ? 'selected' : ''}}>Undecided</option>
                        <option value="Almost customer" {{$client->status == 'Almost customer' ? 'selected' : ''}}>Almost Customer</option>
                        <option value="Customer" {{$client->status == 'Customer' ? 'selected' : ''}}>Customer</option>
                        <option value="Not interested" {{$client->status == 'Not interested' ? 'selected' : ''}}>Not interested</option>
                        <option value="Not interesting" {{$client->status == 'Not interesting' ? 'selected' : ''}}>Not interesting</option>
                    </select>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('samples') ? 'has-error' : '' }}">
                    <label for="samples">Samples</label>
                    <select name="samples" id="samples" class="form-control select1" >
                        <option value="" {{$client->samples == '' ? 'selected' : '' }}></option>
                        <option value="YES" {{$client->samples == 'YES' ? 'selected' : '' }}>YES</option>
                        <option value="NO" {{$client->samples == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                    @if($errors->has('samples'))
                        <p class="help-block">
                            {{ $errors->first('samples') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
                <div class="col-md-6 form-group {{ $errors->has('pricel') ? 'has-error' : '' }}">
                    <label for="pricel">PriceL</label>
                    <select name="pricel" id="pricel" class="form-control select1" >
                        <option value="" {{$client->pricel == '' ? 'selected' : '' }}></option>
                        <option value="YES" {{$client->pricel == 'YES' ? 'selected' : '' }}>YES</option>
                        <option value="NO" {{$client->pricel == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                    @if($errors->has('pricel'))
                        <p class="help-block">
                            {{ $errors->first('pricel') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('importance') ? 'has-error' : '' }}">
                    <label for="importance">Units/day</label>
                    <select name="importance" id="importance" class="form-control select1" >
                        <option value="" {{$client->importance == '' ? 'selected' : '' }}></option>
                        @for($i = 1; $i <= 50 ; $i++)
                        <option value="{{ $i }}" {{$client->importance == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @if($errors->has('importance'))
                        <p class="help-block">
                            {{ $errors->first('importance') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>

                <div class="col-md-6 form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact', isset($client) ? $client->contact : '') }}" required>
                    @if($errors->has('contact'))
                        <p class="help-block">
                            {{ $errors->first('contact') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                    <label for="company">Company</label>
                    <input type="company" id="company" name="company" class="form-control" value="{{ old('company', isset($client) ? $client->company : '') }}">
                    @if($errors->has('company'))
                        <p class="help-block">
                            {{ $errors->first('company') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>

                <div class="col-md-6 form-group {{ $errors->has('town') ? 'has-error' : '' }}">
                    <label for="town">Town</label>
                    <input type="text" id="town" name="town" class="form-control" value="{{ old('town', isset($client) ? $client->town : '') }}">
                    @if($errors->has('town'))
                        <p class="help-block">
                            {{ $errors->first('town') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                    <label for="area">Area</label>
                    <select name="area" id="area" class="form-control select" >
                        <option value="" {{$client->area == '' ? 'selected' : '' }}></option>
                        <option value="Andalucia" {{$client->area == 'Andalucia' ? 'selected' : '' }}>Andalucia</option>
                        <option value="Aragon" {{$client->area == 'Aragon' ? 'selected' : '' }}>Aragon</option>
                        <option value="Asturias" {{$client->area == 'Asturias' ? 'selected' : '' }}>Asturias</option>
                        <option value="Baleares" {{$client->area == 'Baleares' ? 'selected' : '' }}>Baleares</option>
                        <option value="Canarias" {{$client->area == 'Canarias' ? 'selected' : '' }}>Canarias</option>
                        <option value="Cantabria" {{$client->area == 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                        <option value="Cataluna" {{$client->area == 'Cataluna' ? 'selected' : '' }}>Cataluna</option>
                        <option value="Castilla Leon" {{$client->area == 'Castilla Leon' ? 'selected' : '' }}>Castilla Leon</option>
                        <option value="Castilla Mancha" {{$client->area == 'Castilla Mancha' ? 'selected' : '' }}>Castilla Mancha</option>
                        <option value="Ceuuta/Melilla" {{$client->area == 'Ceuuta/Melilla' ? 'selected' : '' }}>Ceuuta/Melilla</option>
                        <option value="Extremadura" {{$client->area == 'Extremadura' ? 'selected' : '' }}>Extremadura</option>
                        <option value="Galicia" {{$client->area == 'Galicia' ? 'selected' : '' }}>Galicia</option>
                        <option value="La Rioja" {{$client->area == 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                        <option value="Madrid" {{$client->area == 'Madrid' ? 'selected' : '' }}>Madrid</option>
                        <option value="Murcia" {{$client->area == 'Murcia' ? 'selected' : '' }}>Murcia</option>
                        <option value="Navarra" {{$client->area == 'Navarra' ? 'selected' : '' }}>Navarra</option>
                        <option value="Pais Vasco" {{$client->area == 'Pais Vasco' ? 'selected' : '' }}>Pais Vasco</option>
                        <option value="Valencia" {{$client->area == 'Valencia' ? 'selected' : '' }}>Valencia</option>
                    </select>
                    @if($errors->has('area'))
                        <p class="help-block">
                            {{ $errors->first('area') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>

                <div class="col-md-6 form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                    <label for="tel">Tel</label>
                    <input type="tel" id="tel" name="tel" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" value="{{ old('tel', isset($client) ? $client->tel : '') }}">
                    <small>Format 123 456 789</small>
                    @if($errors->has('tel'))
                        <p class="help-block">
                            {{ $errors->first('tel') }}
                        </p>
                    @endif
                    <p class="helper-block">

                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    <label for="mobile">Mobile</label>
                    <input type="tel" id="mobile" name="mobile" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" value="{{ old('mobile', isset($client) ? $client->mobile : '') }}">
                    <small>Format 123 456 789</small>
                    @if($errors->has('mobile'))
                        <p class="help-block">
                            {{ $errors->first('mobile') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>

                <div class="col-md-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}" >
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('web') ? 'has-error' : '' }}">
                    <label for="web">Web</label>
                    <input type="text" id="web" name="web" class="form-control" value="{{ old('web', isset($client) ? $client->web : '') }}">
                    @if($errors->has('web'))
                        <p class="help-block">
                            {{ $errors->first('web') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>

                <div class="col-md-6 form-group {{ $errors->has('brands') ? 'has-error' : '' }}">
                    <label for="brands">Brands</label>
                    <select name="brands" id="brands" class="form-control select" >
                        <option value="" {{$client->brands == '' ? 'selected' : '' }}></option>
                        <option value="Mesoestetic" {{$client->brands == 'Mesoestetic' ? 'selected' : '' }}>Mesoestetic</option>
                        <option value="Thalgo" {{$client->brands == 'Thalgo' ? 'selected' : '' }}>Thalgo</option>
                        <option value="Natura Bisse" {{$client->brands == 'Natura Bisse' ? 'selected' : '' }}>Natura Bisse</option>
                        <option value="Skeyndor" {{$client->brands == 'Skeyndor' ? 'selected' : '' }}>Skeyndor</option>
                        <option value="Casmara" {{$client->brands == 'Casmara' ? 'selected' : '' }}>Casmara</option>
                        <option value="Eberlin" {{$client->brands == 'Eberlin' ? 'selected' : '' }}>Eberlin</option>
                        <option value="Medik8" {{$client->brands == 'Medik8' ? 'selected' : '' }}>Medik8</option>
                        <option value="Massada" {{$client->brands == 'Massada' ? 'selected' : '' }}>Massada</option>
                        <option value="Germaine" {{$client->brands == 'Germaine' ? 'selected' : '' }}>Germaine</option>
                        <option value="Biologique" {{$client->brands == 'Biologique' ? 'selected' : '' }}>Biologique</option>
                        <option value="Other" {{$client->brands == 'Other' ? 'selected' : '' }}>Other...</option>
                    </select>
                    @if($errors->has('brands'))
                        <p class="help-block">
                            {{ $errors->first('brands') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                    <label for="comments">Comments</label>
                    <input type="text" id="comments" name="comments" class="form-control" value="{{ old('comments', isset($client) ? $client->comments : '') }}">
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        
                    </p>
                </div>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection