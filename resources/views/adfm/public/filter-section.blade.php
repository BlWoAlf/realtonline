<section class="section section__filter">
    <div class="container">
        <div class="categories">
            @if(request()->route()->named('adfm.show.product'))
            <h1 class="h1-header align-center">Продолжить поиск недвижимости</h1>
            @endif
            <div class="row">
                <div class="col5">
                    <div class="categories__category">
                        <a href="{{route('adfm.show.category', \App\Models\Adfm\Catalog\Category::find(1))}}">Купить</a>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <a href="{{route('adfm.show.category', \App\Models\Adfm\Catalog\Category::find(2))}}">Снять</a>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <span>Продать</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <span>Сдать</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <a href="">Ипотека онлайн</a>
                    </div>
                </div>
            </div>
        </div>
        <form class="filter" method="GET" @if(request()->route()->named('adfm.show.category')) action="{{route('adfm.show.category', request('category'))}}" @else action="{{route('adfm.show.catalog')}}" @endif>
            @csrf
            <div class="filter__field">
                <div class="field__name">Тип недвижимости</div>
                <div class="field__box field__box_select">
                    <select name="filter[type]">
                        @foreach (config('filter-parametres.type') as $key => $item)
                            <option @if(isset(request()->get('filter')['type']) && request()->get('filter')['type'] == $key) selected @endif value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Количество комнат</div>
                <div class="field__box field__box_select">
                    <select name="filter[room_count]">
                        @foreach (config('filter-parametres.room_count') as $key => $item)
                            <option @if(isset(request()->get('filter')['room_count']) && request()->get('filter')['room_count'] == $key) selected @endif value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Стоимость</div>
                <div class="field__box field__box_from-to">
                    <label>
                        <span>От</span> <input type="number" name="filter[price:>=]" @if(isset(request()->get('filter')['price:>=']))value="{{request()->get('filter')['price:>=']}}"@endif>
                    </label>
                    <label>
                        <span>До</span> <input type="number" name="filter[price:<=]" @if(isset(request()->get('filter')['price:<=']))value="{{request()->get('filter')['price:<=']}}"@endif>
                    </label>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Площадь</div>
                <div class="field__box field__box_from-to">
                    <label>
                        <span>От</span> <input type="number" name="filter[square:>=]" @if(isset(request()->get('filter')['square:>=']))value="{{request()->get('filter')['square:>=']}}"@endif>
                    </label>
                    <label>
                        <span>До</span> <input type="number" name="filter[square:<=]" @if(isset(request()->get('filter')['square:<=']))value="{{request()->get('filter')['square:<=']}}"@endif>
                    </label>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name"></div>
                <div class="field__box field__box_button">
                    <button class="filter__button">Найти объявления</button>
                </div>
            </div>
        </form>
    </div>
</section>