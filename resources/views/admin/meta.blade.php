@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Meta podaci</span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body " style="display: block;">
                <table id="responsive-example-table" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th style="text-align: center">Kategorija</th>
                            <th colspan="2" style="text-align: center">Vrijednost</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $metas as $meta )

                            <tr>
                                <td style="text-align: center;">{{ $meta->category }}</td>
                                <td colspan="2" style="text-align: center;">{{ $meta->value }}</td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModalEdit{{$meta->id}}" data-reveal-id="modalEdit{{$meta->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalEdit{{$meta->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.meta.update', [$meta->id]) }}" method="POST" id="formEdit{{$meta->id}}" name="formEdit{{$meta->id}}">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="meta_value">{{ $meta->category }}</label>
                                                        <textarea id="meta_value" name="meta_value" rows="4" cols="50">{{ $meta->value }}</textarea>

                                                        @error('meta_value')
                                                            <small class="error">{{ $message }}</small>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <button class="button radius small success round" type="submit" name="edit" value="{{$meta->id}}">
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
            <!-- end .timeline -->
        </div>
        <!-- box -->
    </div>
</div>

@endsection