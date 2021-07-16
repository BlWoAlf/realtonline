<link rel="stylesheet" href="{{asset('vendor/wtolk/crud/css/hystmodal.min.css')}}">

<form class="form" id="{{$id}}">
    <input class="feedback__field" type="text" placeholder="Как вас зовут ?" name="Как вас зовут ?" required="required">
    <input class="feedback__field" type="tel" placeholder="Номер телефона" name="Номер телефона" required="required">
    <input class="feedback__button sendfeedback" type="button" value="Заказать обратный звонок">
</form>

<div class="hystmodal" id="myModal" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">
            <button data-hystclose class="hystmodal__close">Закрыть</button>
            <div class="result-window">
                <div class="result-window__success">
                    Ваша заявка принята
                </div>
                <div class="result-window__error">
                    Заполните все поля
                </div>
                <button class="result-window__close-button">Хорошо</button>
            </div>
        </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
<script src="{{asset('vendor/wtolk/crud/js/hystmodal.min.js')}}"></script>

<script>
    const myModal = new HystModal({
        linkAttributeName: "data-hystmodal",
        backscroll: false,   
    });

    $('#{{$id}} .sendfeedback').on('click', function (){
        let fields = $('#{{$id}} .feedback__field');
        let data = new Object;
        let fill = true;

        data['fields'] = new Object;
        data['_token'] = $('meta[name="csrf-token"]').attr('content');
        $.map(fields, function (field, index) {
            data['fields'][$(field).attr('name')] = $(field).val();
            if($(field).val() == ''){
                fill = false;
                return false;                
            }
        });

        $('.result-window').children().removeClass('view');

        if(fill){
            $.ajax({
            method: "POST",
            url: "{{ route('adfm.feedbacks.store') }}",
            data: data
            });

            $.map(fields, function (field, index) {
                $(field).val(''); 
            });

            $('.result-window__success').addClass('view');
        }else{
            $('.result-window__error').addClass('view');
        }

        myModal.open('#myModal');
    });

    $('.result-window__close-button').click(function(){
        myModal.close('#myModal');
    });
</script>
