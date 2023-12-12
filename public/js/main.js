const btn__tab = document.querySelectorAll('.btn__tab')
const all_content = document.querySelectorAll('.content__card')
const url = window.location.href;

console.log(btn__tab)

btn__tab.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        btn__tab.forEach(tab => {
            tab.classList.remove('active')
        })
        tab.classList.add('active')

        all_content.forEach(content => {
            content.classList.remove('active')
        })

        all_content[index].classList.add('active')
    })
})

$('#all__cars').click(function () {
    let CategoryId = $(this).attr('data-category-id');
    $('#dflexCars').empty();
    $.get('/api/store/category/' + CategoryId, function (data) {
        $.each(data.products, function (index, value) {
            let path = url + "checkout/" + value.id
            let html = '<div class="display">\n' +
                '                        <div class="content">\n' +
                '                            <figure><img src="' + value.img + '" alt=""\n' +
                '                                         class="img-fluid"></figure>\n' +
                '                            <h4>' + value.name + '</h4>\n' +
                '                            <p>' + value.description + '</p>\n' +
                '                            <div class="d-flex">\n' +
                '                                <button class="price">R$: ' + value.price + '</button>\n' +
                '                                <button onclick="window.location.href=\' ' + path + '\'" class="cart">Comprar</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#dflexCars').append(html);
        });
    });
})

$('#all__vip').click(function () {
    let CategoryId = $(this).attr('data-category-id');
    $('#dFlexVip').empty();
    $.get('/api/store/category/' + CategoryId, function (data) {
        $.each(data.products, function (index, value) {
            let path = url + "checkout/" + value.id
            let html = '<div class="display">\n' +
                '                        <div class="content">\n' +
                '                            <figure><img src="' + value.img + '" alt=""\n' +
                '                                         class="img-fluid"></figure>\n' +
                '                            <h4>' + value.name + '</h4>\n' +
                '                            <span>' + value.description + '</span>\n' +
                '                            <div class="d-flex">\n' +
                '                                <button class="price">R$: ' + value.price + '</button>\n' +
                '                                <button onclick="window.location.href=\' ' + path + '\'" class="cart">Comprar</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#dFlexVip').append(html);
        });
    });
})

$('#all__money').click(function () {
    let CategoryId = $(this).attr('data-category-id');
    $('#dFlexMoney').empty();
    $.get('/api/store/category/' + CategoryId, function (data) {
        $.each(data.products, function (index, value) {
            let path = url + "checkout/" + value.id
            let html = '<div class="display">\n' +
                '                        <div class="content">\n' +
                '                            <figure><img src="' + value.img + '" alt=""\n' +
                '                                         class="img-fluid"></figure>\n' +
                '                            <h4>' + value.name + '</h4>\n' +
                '                            <span>' + value.description + '</span>\n' +
                '                            <div class="d-flex">\n' +
                '                                <button class="price">R$: ' + value.price + '</button>\n' +
                '                                <button onclick="window.location.href=\' ' + path + '\'" class="cart">Comprar</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#dFlexMoney').append(html);
        });
    });
})

$('#all__extra').click(function () {
    let CategoryId = $(this).attr('data-category-id');
    $('#dFlexExtra').empty();
    $.get('/api/store/category/' + CategoryId, function (data) {
        $.each(data.products, function (index, value) {
            let path = url + "checkout/" + value.id
            let html = '<div class="display">\n' +
                '                        <div class="content">\n' +
                '                            <figure><img src="' + value.img + '" alt=""\n' +
                '                                         class="img-fluid"></figure>\n' +
                '                            <h4>' + value.name + '</h4>\n' +
                '                            <span>' + value.description + '</span>\n' +
                '                            <div class="d-flex">\n' +
                '                                <button class="price">R$: ' + value.price + '</button>\n' +
                '                                <button onclick="window.location.href=\' ' + path + '\'" class="cart">Comprar</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
            $('#dFlexExtra').append(html);
        });
    });
})


