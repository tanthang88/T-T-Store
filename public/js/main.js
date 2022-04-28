$(".breadcrumb-item").last().addClass("active").css("color", "gray");
$(".breadcrumb-item a").last().css("color", "gray").attr("href", "#");
async function getApi(URL) {
    return new Promise(
        (resolve, reject) => {
            fetch(URL,{method:'GET'})
                .then(function (response) {
                    if (response.ok == true && response.status == 200) {
                        return resolve(response.json());
                    } else {
                        return reject(response.json());
                    }
                })
        }
    );
}
$("select#provinces").focusin(async function () {
    await mainFunction(renderProvinces);
});
async function mainFunction() {
    try {
        const listProvinces = await getApi('https://provinces.open-api.vn/api/?depth=3');
        await renderProvinces(listProvinces);
        $("select#provinces").change(function () {
            $("select#provinces option:selected").each(async function () {
                const ID_Province = $(this).data("province");
                const listDistricts = await getApi(`https://provinces.open-api.vn/api/p/${ID_Province}?depth=2`)
                await renderDistricts(listDistricts);
            })
        });
        $("select#districts").change(function () {
            $("select#districts option:selected").each(async function () {
                const ID_District = $(this).data("district");
                const dataWards = await getApi(`https://provinces.open-api.vn/api/d/${ID_District}?depth=2`)
                await renderWards(dataWards);
            })
        })
    } catch (e) {
        console.log(e.message);
    }
}

async function renderProvinces(data) {
    const listProvince = data.map(listProvince => {
        return `<option class="province" data-province="${listProvince.code}" value="${listProvince.name}">${listProvince.name}</option>`;
    });
    $("select#provinces").html(listProvince.join(''));
}

async function renderDistricts(data) {
    const listDistricts = data.districts;
    const list = listDistricts.map(listDistricts => {
         return `<option class="district" data-district="${listDistricts.code}" value="${listDistricts.name}">${listDistricts.name}</option>`;
     });
     $("select#districts").html(list.join(''));
}

async function renderWards(data) {
    let $listWards = data.wards;
    const html = $listWards.map(listWards => {
        return `<option class="district" value="${listWards.name}">${listWards.name}</option>`;
    });
    $("select#wards").html(html.join(''));
}

// (async () => {
//     await mainFunction();
// })();
// async function start(){
//     await mainFunction(renderProvinces);
// };
// console.log($("select#provinces"))

// var value = $("select").change(function () {
//     $("select option:selected").each(function () {
//         return $(this).val();
//     })
// })
// console.log(value[0]);
// start();
//
// mainFunction(){
//     await getApiListProvince();
// }
