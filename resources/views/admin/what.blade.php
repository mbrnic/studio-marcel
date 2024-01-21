@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>What I Do</span>
                </h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body " style="display: block;">
                <table id="responsive-example-table" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th colspan="2" style="text-align: center">Kategorija</th>
                            <th colspan="2" style="text-align: center">Vrijednost</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $whats as $what )

                            <tr>
                                <td colspan="2" style="text-align: center;">{{ $what->category }}</td>
                                <td colspan="2" style="text-align: center;">{{ $what->value }}</td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModalEdit{{$what->id}}" data-reveal-id="modalEdit{{$what->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalEdit{{$what->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                        <form action="{{ route('admin.what.update', [$what->id]) }}" method="POST" enctype="multipart/form-data" id="formEdit{{$what->id}}" name="formEdit{{$what->id}}">
                                            @method('PUT')
                                            @csrf

                                            @switch ($what->category)

                                                @case ('do photography text')
                                                @case ('do filming text')
                                                @case ('do video snapping text')
                                                @case ('what i do video img alt')
                                                    
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <label for="text_value">{{ $what->category }}</label>
                                                            <input type="text" placeholder="" id="text_value" name="text_value" value="{{ $what->value }}">
                                                        </div>
                                                    </div>

                                                    @break

                                                @case ('what i do video src')

                                                    @if ( Str::contains($what->value, 'youtube.com/watch') )

                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <iframe height="150"
                                                                    src="{{ Str::replace('watch?v=', 'embed/', $what->value) }}">
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <label for="new_video">Novi video upload</label>
                                                                <input type="file" placeholder="" id="new_video" name="new_video">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                ili
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <label for="text_value">Novi youtube link (Primjer: https://www.youtube.com/watch?v=YdUr28ECL3M)</label>
                                                                <input type="text" placeholder="" id="video_value" name="video_value" value="{{ $what->value }}">
                                                            </div>
                                                        </div>

                                                    @elseif ( Str::contains($what->value, '.mp4') )

                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <video height="150" controls>
                                                                    <source src="{{ asset('item/' . $what->value )}}" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <label for="new_video">Novi video upload</label>
                                                                <input type="file" placeholder="" id="new_video" name="new_video">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                ili
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="large-12 columns">
                                                                <label for="text_value">Novi youtube link (Primjer: https://www.youtube.com/watch?v=YdUr28ECL3M)</label>
                                                                <input type="text" placeholder="" id="video_value" name="video_value" value="">
                                                            </div>
                                                        </div>

                                                    @endif

                                                    @break

                                                @case ('what i do video img src')

                                                    <div class="row">
                                                        <div class="large-12 columns">

                                                            @if ( Str::contains($what->value, 'youtube.com/watch') )
                                                                <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $what->value) }}/hqdefault.jpg" alt="" style="height: 150px;">
                                                            @else
                                                                <img src="{{ asset('item/' . $what->value ) }}" alt="" style="height: 150px;">
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <label for="new_image">Nova slika upload</label>
                                                            <input type="file" placeholder="" id="new_image" name="new_image">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            ili
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <label for="image_value">Preuzmi od youtube link (https://www.youtube.com/watch?v=YdUr28ECL3M)</label>
                                                            <input type="text" placeholder="" id="image_value" name="image_value" value="@if ( Str::contains($what->value, 'youtube.com/watch') ){{ $what->value }}@endif">
                                                        </div>
                                                    </div>

                                                    @break

                                                @case ('what i do video description')

                                                    <div class="row">
                                                        <div class="large-12 columns">
                                                            <label for="description_value">{{ $what->category }}</label>
                                                            <textarea id="description_value" name="description_value" rows="4" cols="50">{{ $what->value }}</textarea>
                                                        </div>
                                                    </div>

                                                    @break

                                            @endswitch

                                            <button class="button radius small success round" type="submit" name="edit" value="{{$what->id}}">
                                                <span class="icon-document-edit"></span> Spremi promjenu
                                            </button>
                                        </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>






        <div class="box">
            <div hidden class="box-body " style="display: block;">
                <div style="text-align: center;">
                    <button data-reveal-id="modal2AddNew" class="button radius small round">
                        <span class="icon-tag"></span> Dodaj novu sliku
                    </button>

                    <!-- Reveal Modals begin -->
                    <div id="modal2AddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                        <h2>Dodaj novu</h2>
                        <div class="large-12 columns">

                            <form action="{{ route('admin.what.store') }}" method="POST" enctype="multipart/form-data" id="formAddNew" name="formAddNewName">
                                @csrf
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="image">Slika</label>
                                        <input type="file" placeholder="" id="image" name="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="category">Kategorija
                                        <select id="category" name="category"></label>
                                            <option value="">--Izaberi kategoriju--</option>
                                            <option value="photography">{{ $doPhotographyText }}</option>
                                            <option value="filming">{{ $doFilmingText }}</option>
                                            <option value="video snapping">{{ $doVideoSnappingText }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="alt_text">Alt tekst</label>
                                        <input type="text" placeholder="" id="alt_text" name="alt_text">
                                    </div>
                                </div>
                                <button class="button radius small round" type="submit" name="addNew" value="addNew">
                                    <span class="icon-tag"></span> Dodaj
                                </button>
                            </form>

                        </div>
                        <a class="close-reveal-modal">×</a>
                    </div>
                    <!-- Reveal Modals end -->
                </div>


                <table id="responsive-example-table-2" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th style="text-align: center">Slika</th>
                            <th style="text-align: center">Kategorija</th>
                            <th style="text-align: center">Alt tekst</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $whatDoImages as $whatDoImage )

                            <tr>
                                <td style="text-align: center;">
                                    <img src="{{ asset('item/' . $whatDoImage->src) }}" alt="{{ $whatDoImage->alt }}" style="height: 150px;">
                                </td>
                                <td style="text-align: center;">{{ $whatDoImage->category }}</td>
                                <td style="text-align: center;">{{ $whatDoImage->alt }}</td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModal2Edit{{$whatDoImage->id}}" data-reveal-id="modal2Edit{{$whatDoImage->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Edit{{$whatDoImage->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.what.update', [$whatDoImage->id]) }}" method="POST" enctype="multipart/form-data" id="formEdit{{$whatDoImage->id}}" name="formEdit{{$whatDoImage->id}}">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <img src="{{ asset('item/' . $whatDoImage->src) }}" alt="{{ $whatDoImage->alt }}" style="height: 150px;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="image">Nova slika</label>
                                                        <input type="file" placeholder="" id="image" name="image">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label>Kategorija
                                                            <select id="category" name="category">
                                                                <option value="">--Izaberi kategoriju--</option>
                                                                <option @if ($whatDoImage->category=='photography') selected @endif value="photography">Photography</option>
                                                                <option @if ($whatDoImage->category=='filming') selected @endif value="filming">Filming</option>
                                                                <option @if ($whatDoImage->category=='video snapping') selected @endif value="video snapping">Video Snapping</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="alt_text">Alt tekst</label>
                                                        <input type="text" placeholder="" id="alt_text" name="alt_text" value="{{ $whatDoImage->alt }}">
                                                    </div>
                                                </div>
                                                <button class="button radius small success round" type="submit" name="edit" value="{{$whatDoImage->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>
                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->


                                    <button id="buttonRevealModal2Delete{{$whatDoImage->id}}" data-reveal-id="modal2Delete{{$whatDoImage->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Delete{{$whatDoImage->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                    <h2>Obriši</h2>
                                    <div class="large-12 columns">
                                
                                        <form action="{{ route('admin.what.destroy', [$whatDoImage->id]) }}" method="POST" id="formDelete{{$whatDoImage->id}}" name="formDelete{{$whatDoImage->id}}">
                                            @method('DELETE')
                                            @csrf

                                            <div class="row">
                                                    <div class="large-12 columns">
                                                        <img src="{{ asset('item/' . $whatDoImage->src) }}" alt="{{ $whatDoImage->alt }}" style="height: 150px;">
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label>Kategorija
                                                        <select disabled id="category" name="category">
                                                            <option value="">--Izaberi kategoriju--</option>
                                                            <option @if ($whatDoImage->category=='photography') selected @endif value="photography">Photography</option>
                                                            <option @if ($whatDoImage->category=='filming') selected @endif value="filming">Filming</option>
                                                            <option @if ($whatDoImage->category=='video snapping') selected @endif value="video snapping">Video Snapping</option>
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="alt_text">Alt tekst</label>
                                                    <input disabled type="text" placeholder="" id="alt_text" name="alt_text" value="{{ $whatDoImage->alt }}">
                                                </div>
                                            </div>
                                            <button class="button radius small alert round" type="submit" name="delete" value="{{$whatDoImage->id}}">
                                                <span class="icon-trash"></span> Obriši
                                            </button>

                                        </form>

                                    </div>
                                    <a class="close-reveal-modal">×</a>
                                </div>
                                <!-- Reveal Modals end -->

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- end .timeline -->
        </div>
        <!-- box -->
    </div>
</div>


@endsection