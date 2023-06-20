//mod intunecat buton
let toggle_intunecat = document.querySelector(".mod-intunecat-schimba");
toggle_intunecat.onclick = () => {
  document.querySelector("#id1").classList.toggle("intunecat");
  document.querySelector("#id1").classList.toggle("luminos");
};
let an_global=2023;
let luna_globala=4;
//an bisect
function displayCreatedActivities() {
  $.ajax({
    url: 'display_created_activities.php',
    method: 'GET',
    success: function(response) {
      var data = JSON.parse(response);
      var spanText = document.getElementById('span-cu-data').textContent;

      data.forEach(function(row) {
        if (row.data1 == spanText) {
          var divId = 'lista_activitati_create' + row.ora;
          var parentDiv = document.getElementById(divId);
          var newDiv = document.createElement('div');
          newDiv.textContent = 'Nume activitate: ' + row.nume_activitate + ', Tip activitate: ' + row.tip_activitate + 'data:' + row.data1;
          parentDiv.appendChild(newDiv);
        }
      });
    },
    error: function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    }
  });
}

esteAnBisect = (an) => {
  return (
    (an % 4 === 0 && an % 100 !== 0 && an % 400 !== 0) ||
    (an % 100 === 0 && an % 400 === 0)
  );
};

zileFeb = (an) => {
  return esteAnBisect(an) ? 29 : 28;
};

let calendar = document.querySelector(".calendar");

const nume_luni = [
  "Ianuarie",
  "Februarie",
  "Martie",
  "Aprilie",
  "Mai",
  "Iunie",
  "Iulie",
  "August",
  "Septembrie",
  "Octombrie",
  "Noiembrie",
  "Decembrie",
];
const nume_ore = [
  "6:00",
  "7:00",
  "8:00",
  "9:00",
  "10:00",
  "11:00",
  "12:00",
  "13:00",
  "14:00",
  "15:00",
  "16:00",
  "17:00",
  "18:00",
  "19:00",
  "20:00",
  "21:00",
  "22:00",
  "23:00",
  "00:00",
  "1:00",
  "2:00",
  "3:00",
  "4:00",
  "5:00",
];
let luni = document.querySelector("#luni");

luni.onclick = () => {
  lista_luni.classList.add("arata");
};

genereazaCalendar = (luna, an) => {
  let zile = document.querySelector(".zile");
  zile.innerHTML = "";
  let an_inceput = document.querySelector("#an");

  let zilele_lunii = [31, zileFeb(an), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

  let data_curenta = new Date();

  luni.innerHTML = nume_luni[luna];
  an_inceput.innerHTML = an;

  let prima_zi = new Date(luna, an, 1);

  for (let i = 0; i <= zilele_lunii[luna] + prima_zi.getDay() - 1; i++) {
    let zi = document.createElement("div");
    if (i >= prima_zi.getDay()) {
      zi.classList.add("calendar-zi-hover");

      //let buton_zi=document.createElement('button')

      //buton_zi.innerHTML=i-prima_zi.getDay()+1
      // let text3=toString(text2)
      //text1.concat(text3)
      // zi.innerHTML=text1
      // zi.innerHTML='<button type="submit" name="buton_zi">';
      zi.innerHTML = `<button type="submit" id="buton-zi">${
        i - prima_zi.getDay() + 1
      }</button>`; //asa creez buton cu valoare numerica in el

      //  zi.innerHTML+='<button>';

      if (
        i - prima_zi.getDay() + 1 === data_curenta.getDate() &&
        an === data_curenta.getFullYear() &&
        luna === data_curenta.getMonth()
      ) {
        zi.classList.add("data-curenta");
      }
    }

    zile.appendChild(zi);
  }
};


genereazaOre = (luna,an,displayCreatedActivities)=>{

let lista_ore=document.querySelector(".lista-ore-header");
lista_ore.innerHTML="";
let span_data=document.createElement("div");
span_data.innerHTML=`<span id="span-cu-data" class="span-cu-data">  ${nume_luni[luna]} ${an}</span>`;

lista_ore.appendChild(span_data);


};

let lista_luni = calendar.querySelector(".lista-luni");




nume_luni.forEach((e, index) => {
  let luna = document.createElement("div");
  luna.innerHTML = `<div>${e}</div>`;
  luna.onclick = () => {
    lista_luni.classList.remove("arata");
    luna_curenta.value = index;
    genereazaCalendar(luna_curenta.value, an_curent.value);
    genereazaOre(luna_curenta.value, an_curent.value,displayCreatedActivities);
    //displayCreatedActivities();
  };
  lista_luni.appendChild(luna);
});



document.querySelector("#an-precedent").onclick = () => {
  an_curent.value = an_curent.value - 1;
   an_global = an_curent.value;
  genereazaCalendar(luna_curenta.value, an_curent.value);
  genereazaOre(luna_curenta.value, an_curent.value,displayCreatedActivities);
 // displayCreatedActivities();
};
document.querySelector("#an-urmator").onclick = () => {
  an_curent.value = an_curent.value + 1;
   an_global = an_curent.value;
  genereazaCalendar(luna_curenta.value, an_curent.value);
  genereazaOre(luna_curenta.value, an_curent.value,displayCreatedActivities);
 // displayCreatedActivities();
};
let data_curenta = new Date();

let luna_curenta = { value: data_curenta.getMonth() };
let an_curent = { value: data_curenta.getFullYear() };

genereazaCalendar(luna_curenta.value, an_curent.value);

/*
let lista_ore=calendar.querySelector(".lista-ore");

let span_data=document.createElement("div");
span_data.innerHTML=`<span class="span-cu-data">.${luna_globala.value}.${an_global.value}.</span>`;

lista_ore.appendChild(span_data);

*/



genereazaOre(luna_curenta.value, an_curent.value,displayCreatedActivities);
//genereazaOre(4,2023);

let buton_zi = document.querySelector('#buton-zi');
let lista_ore_mare=document.querySelector('.lista-ore-mare');

buton_zi.onclick = () => {

  lista_ore_mare.classList.add('arata-ore');
};

let outside=document.querySelector('.intunecat')

outside.onclick=()=>{
    lista_ore_mare.classList.remove('arata-ore');
};


/*
function showForm(formId) {
  var form = document.getElementById(formId);
  form.classList.add("show");
}

function hideForm(formId) {
  var form = document.getElementById(formId);
  form.classList.remove("show");
}
*/

var my_span_luni=document.getElementById("luni");
var hidden_value_luni=document.getElementById("hidden_value_luni");

my_span_luni.addEventListener("input",function(){
  hidden_value_luni=my_span_luni.innerHTML;
});







