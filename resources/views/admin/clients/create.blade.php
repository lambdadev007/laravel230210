@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Contact
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <option value=""></option>
                        <option value="No contact">No Contact</option>
                        <option value="RECALL">RECALL</option>
                        <option value="Call 1">Call 1</option>
                        <option value="Call 2">Call 2</option>
                        <option value="Call 3">Call 3</option>
                        <option value="Undecided">Undecided</option>
                        <option value="Almost customer">Almost Customer</option>
                        <option value="Customer">Customer</option>
                        <option value="Not interested">Not interested</option>
                        <option value="Not interesting">Not interesting</option>
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
                        <option value=""></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
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
                        <option value=""></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
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
                        <option value=""></option>
                        @for($i = 1; $i <= 50 ; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
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
                        <option value=""></option>
                        <option value="Andalucia">Andalucia</option>
                        <option value="Aragon">Aragon</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Baleares">Baleares</option>
                        <option value="Canarias">Canarias</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Cataluna">Cataluna</option>
                        <option value="Castilla Leon">Castilla Leon</option>
                        <option value="Castilla Mancha">Castilla Mancha</option>
                        <option value="Ceuuta/Melilla">Ceuuta/Melilla</option>
                        <option value="Extremadura">Extremadura</option>
                        <option value="Galicia">Galicia</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Navarra">Navarra</option>
                        <option value="Pais Vasco">Pais Vasco</option>
                        <option value="Valencia">Valencia</option>
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
                    <input type="tel" id="tel" name="tel" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" >
                    <small>Format: 123 456 789</small>
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
                    <input type="tel" id="mobile" name="mobile" class="form-control" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" >
                    <small>Format: 123 456 789</small>
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
                        <option value=""></option>
                        <option value="Mesoestetic">Mesoestetic</option>
                        <option value="Thalgo">Thalgo</option>
                        <option value="Natura Bisse">Natura Bisse</option>
                        <option value="Skeyndor">Skeyndor</option>
                        <option value="Casmara">Casmara</option>
                        <option value="Eberlin">Eberlin</option>
                        <option value="Medik8">Medik8</option>
                        <option value="Massada">Massada</option>
                        <option value="Germaine">Germaine</option>
                        <option value="Biologique">Biologique</option>
                        <option value="Other">Other...</option>
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