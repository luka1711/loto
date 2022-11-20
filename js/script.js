$(document).ready(function () {

    ucitajKola();
    $('.broj').change(function (e) {
        e.preventDefault();
        if ($(this).val() < 1 || $(this).val() > 39) {
            alert('Brojevi moraju biti izmedju 1 i 39.');
            ucitajBrojeve();
            return;
        }
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/loto/api/izmeni_ili_dodaj_izabrani.php",
            data: {
                id: $(this).attr('id'),
                noviBroj: $(this).val()
            },
            dataType: "text",
            success: function (response) {
                if (response != '')
                    alert(response);
                ucitajBrojeve();
            }
        });
    });
    ucitajBrojeve();

    function ucitajBrojeve() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/loto/api/vrati_izabrane.php",
            dataType: "JSON",
            success: function (response) {
                popuniBrojeve(response);
            }
        });
    }

    function popuniBrojeve(brojevi) {
        brojevi.forEach(broj => {
            $(`#${broj.id}`).val(broj.broj);
        });
    }

    $('body').on('click', '.obrisi', function () {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/loto/api/izbrisi_kolo.php?id_kolo=" + $(this).attr('id'),
            dataType: "text",
            success: function (response) {
                alert(response);
                ucitajKola();
            }
        });
    });


    $('#generisi-kolo').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "http://localhost:8080/loto/api/generisi_kolo.php",
            data: {
                naziv: $('#naziv').val(),
                broj_izvucenih: $('#broj_izvucenih').val()
            },
            dataType: "JSON",
            success: function (response) {
                $('#pogodjeno').val(`${response.pogodjeno} (${response.pogodjeni.join(',')})`);
            }
        });
    });

    function ucitajKola() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8080/loto/api/vrati_kola.php",
            dataType: "JSON",
            success: function (response) {
                popuniTabelu(response);
            }
        });
    }

    function popuniTabelu(kola) {
        $('#kola-tabela tbody').html('');
        kola.forEach(kolo => $('#kola-tabela tbody').append(popuniRedTabele(kolo)));
    }

    function popuniRedTabele(kolo) {
        return `<tr>
            <td scope="row">${kolo.id}</td>
            <td>${kolo.naziv}</td>
            <td>${kolo.broj_izvucenih}</td>
            <td>${kolo.broj_pogodjenih}/7</td>
            <td><button type="button" name="" id="${kolo.id}" class="btn btn-warning obrisi">Obrisi</button></td>
        </tr>`
    }
});