@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Portfolio</span>
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

                        @foreach ( $portfolioValues as $portfolioValue )

                            <tr>
                                <td colspan="2" style="text-align: center;">{{ $portfolioValue->category }}</td>
                                <td colspan="2" style="text-align: center;">{{ $portfolioValue->value }}</td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModalEdit{{$portfolioValue->id}}" data-reveal-id="modalEdit{{$portfolioValue->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalEdit{{$portfolioValue->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                        <form action="{{ route('admin.portfolio.update', [$portfolioValue->id]) }}" method="POST" enctype="multipart/form-data" id="formEdit{{$portfolioValue->id}}" name="formEdit{{$portfolioValue->id}}">
                                            @method('PUT')
                                            @csrf

                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="text_value">{{ $portfolioValue->category }}</label>
                                                    <input type="text" placeholder="" id="text_value" name="text_value" value="{{ $portfolioValue->value }}">
                                                </div>
                                            </div>

                                            <button class="button radius small success round" type="submit" name="edit" value="{{$portfolioValue->id}}">
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
                        <span class="icon-tag"></span> Dodaj novi portfolio
                    </button>

                    <!-- Reveal Modals begin -->
                    <div id="modal2AddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                        <h2>Dodaj novi portfolio</h2>
                        <div class="large-12 columns">

                            <form action="{{ route('admin.portfolio.store') }}" method="POST" id="formAddNew" name="formAddNewName">
                                @csrf

                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="name">Naziv</label>
                                        <input type="text" placeholder="" id="name" name="name" value="{{ old('name') }}">
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
                            <th style="text-align: center">Naslovnica</th>
                            <th style="text-align: center">Naziv</th>
                            <th style="text-align: center">Redoslijed</th>
                            <th style="text-align: center">Pomicanje</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $portfolios as $portfolio )

                            <tr>
                                <td style="text-align: center;">
                                    @if (isset($portfolio->headline))
                                        @if ( Str::contains($portfolio->headline->src, 'youtube.com/watch') )
                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $portfolio->headline->src) }}/hqdefault.jpg" alt="{{ $portfolio->headline->alt }}" style="height: 150px;">
                                        @else
                                            <img src="{{ asset('item/' . $portfolio->headline->src) }}" alt="{{ $portfolio->headline->alt }}" style="height: 150px;">
                                        @endif
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ $portfolio->title }}</td>
                                <td style="text-align: center;">{{ $portfolio->order_id }}</td>
                                <td style="text-align: center;">
                                    <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'portfolio', 'order_id' => $portfolio->order_id, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-up"></span> Pomakni gore
                                    </a>
                                    <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'portfolio', 'order_id' => $portfolio->order_id, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-down"></span> Pomakni dolje
                                    </a>
                                </td>

                                <td style="text-align: center;">

                                    <a href="{{ route('admin.gallery', ['category' => 'portfolio', 'order_id' => $portfolio->order_id]) }}" class="button radius small info round">
                                        <span class="icon-camera"></span> Galerija
                                    </a>

                                    <button id="buttonRevealModal2Edit{{$portfolio->id}}" data-reveal-id="modal2Edit{{$portfolio->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Edit{{$portfolio->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi portfolio</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.portfolio.update', [$portfolio->id]) }}" method="POST" id="formEdit{{$portfolio->id}}" name="formEdit{{$portfolio->id}}">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="name">Naziv</label>
                                                        <input type="text" placeholder="" id="name" name="name" value="{{ $portfolio->title }}">
                                                    </div>
                                                </div>

                                                <button class="button radius small success round" type="submit" name="edit" value="{{$portfolio->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>

                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->


                                    <button id="buttonRevealModal2Delete{{$portfolio->id}}" data-reveal-id="modal2Delete{{$portfolio->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Delete{{$portfolio->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                    <h2>Obriši portfolio</h2>
                                    <div class="large-12 columns">
                                
                                        <form action="{{ route('admin.portfolio.destroy', [$portfolio->id]) }}" method="POST" id="formDelete{{$portfolio->id}}" name="formDelete{{$portfolio->id}}">
                                            @method('DELETE')
                                            @csrf

                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="name">Naziv</label>
                                                    <input disabled type="text" placeholder="" id="name" name="name" value="{{ $portfolio->title }}">
                                                </div>
                                            </div>

                                            <button class="button radius small alert round" type="submit" name="delete" value="{{$portfolio->id}}">
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