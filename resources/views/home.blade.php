@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Sveicināti!</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($errors->all() as $message)
                        <p class="has-error"><h4><b>{{ $message }}</b></h4></p>
                    @endforeach

                        Latvijas mērogā nav nevienas tīmekļa vietnes vai lietotnes, kurā vienuviet būtu apkopoti vairāki maršruti un
                        līdzbraucēju sludinājumi. Nav arī iespējams kādā konkrētā veidā vienoties ar individuālajiem braucējiem par
                        sūtījuma piegādi no punkta A līdz punktam B, kas parasti notiek ar starppilsētu autobusu vadītāju vai pasta
                        pakalpojumu palīdzību.
                        Eksistē vairākas grupas līdzbraucēju meklēšanai sociālajā tīklā “Facebook”, taču to trūkums ir tas, ka katra
                        gandrīz no tām specializējas tikai uz vienu maršrutu.
                        Šīs vietnes mērķis ir risināt iepriekš minētās problēmas ar vienkārša un ērta dizaina mājas lapas palīdzību.


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
