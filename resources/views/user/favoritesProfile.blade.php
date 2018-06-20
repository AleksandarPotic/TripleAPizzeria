@foreach($favorites as $favorite)
    <div class="col-12" id="item" style="border: none;">
        <form action="{{ route('favorite.add') }}" method="POST">
            @csrf
            <ul class="list-inline">
                <li class="list-inline-item"><b>{{ $favorite->identifier }}</b></li>
                <li class="list-inline-item"><b>${{ $favorite->price }}</b></li>
                <input type="hidden" name="identifier" id="identifier" value="{{ $favorite->identifier }}">
                <input type="hidden" name="id" id="id_user" value="{{ Auth::user()->id }}">
                <li class="list-inline-item text-right"><button class="btn btn-default" type="button" onclick="addFavorites('{{ $favorite->identifier }}','{{ Auth::user()->id }}')" data-toggle="modal" data-target="#exampleModal1">Add to Your Order</button> <button class="btn btn-default" style="margin-top: 5px; padding-left: 16px; padding-right: 16px;" type="button" data-toggle="modal" data-target=".fav_re_{{ $favorite->identifier }}">Remove Favorite</button></li>
            </ul>

            <!-- Modal for remove All products -->
            <div class="modal fade fav_re_{{ $favorite->identifier }}" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p class="modal-p">Do you really want to delete this favorite?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="remove_product_button" class="btn btn-secondary" data-dismiss="modal" onclick="DeleteFavorite('{{ $favorite->identifier }}')">Remove</button>
                            <button type="button" id="add_cart" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Modal -->
            <div class="line"></div>
        </form>
    </div>
@endforeach
@if($favorites->count() > 0)
    <div class="col-12">
        <nav aria-label="..." style="margin-top: 30px; margin-left: 15px;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $favorites->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
                @for($i=1;$i < number_format($favorites->total() / 3 + 2); $i++)
                    <li class="page-item"><a class="page-link" href="{{ $favorites->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $favorites->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@else
    <div class="col-12">
        <div class="alert alert-success" id="remove-alert" style="background-color: #e66001; color: white; border: none; text-align: center;">
            You don't have any favorites!
        </div>
    </div>
@endif