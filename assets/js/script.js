const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

provincia = document.querySelector("#signin-provincias");

loc_label = document.querySelector("#signin-ciud-label");
localidades = document.querySelector("#signin-ciudades");
loc_opc = document.querySelectorAll(".loc_opc");

if (provincia != null) {
  if (provincia.selectedIndex != 0) {
    loc_opc.forEach((loc) => {
      if (loc.id == provincia.selectedIndex) {
        loc.classList.remove("d-none");
      } else {
        loc.classList.add("d-none");
      }
    });
  }
  
  provincia.addEventListener("change", function (e) {
    if (provincia.selectedIndex != 0) {
      loc_opc.forEach((loc) => {
        if (loc.id == provincia.selectedIndex) {
          loc.classList.remove("d-none");
        } else {
          loc.classList.add("d-none");
        }
      });
    }
  });
}

btn_sidebar = document.getElementById("btn_sidebar");
btn_sidebar_icon = document.getElementById("btn_sidebar_icon");
iconoIzq = '<i class="fa-solid fa-chevron-left"></i>';
iconoDer = '<i class="fa-solid fa-chevron-right"></i>';
tienda_prods = document.getElementById("tienda_prods");

if (btn_sidebar != null) {
  btn_sidebar.addEventListener("click", function () {
    if (!btn_sidebar.classList.contains("collapsed")) {
      btn_sidebar_icon.innerHTML = iconoIzq;
      tienda_prods.classList.remove("col-md-11");
      tienda_prods.classList.add("col-md-6");
      tienda_prods.classList.add("col-lg-8");
    } else {
      btn_sidebar_icon.innerHTML = iconoDer;
      tienda_prods.classList.remove("col-md-6");
      tienda_prods.classList.remove("col-lg-8");
      tienda_prods.classList.add("col-md-11");
    }
  });
}

prod_clasif = document.querySelector("#prod-clasif");
subclasif_prod = document.querySelectorAll(".subclasif-prod");

if (prod_clasif != null) {
  if (prod_clasif.selectedIndex != 0) {
    subclasif_prod.forEach((clasif) => {
      if (clasif.id == prod_clasif.selectedIndex) {
        clasif.classList.remove("d-none");
      } else {
        clasif.classList.add("d-none");
      }
    });
  }

  prod_clasif.addEventListener("change", function (e) {
    if (prod_clasif.selectedIndex != 0) {
      subclasif_prod.forEach((clasif) => {
        if (clasif.id == prod_clasif.selectedIndex) {
          clasif.classList.remove("d-none");
        } else {
          clasif.classList.add("d-none");
        }
      });
    }
  });
}

btn_prod_baja = document.querySelector("#prod_baja");
tabla_alta = document.querySelector("#tabla_alta");
tabla_baja = document.querySelector("#tabla_baja");

if (btn_prod_baja != null) {
  btn_prod_baja.addEventListener("click", function (e) {
    if(btn_prod_baja.innerHTML == "Mostrar productos dados de baja") {
      btn_prod_baja.innerHTML = "Mostrar productos dados de alta";
    } else {
      btn_prod_baja.innerHTML = "Mostrar productos dados de baja";
    }
    tabla_alta.classList.toggle('d-none');
    tabla_baja.classList.toggle('d-none');
  });
}

bnt_agregar_clasif = document.getElementById('btn_agregar_clasif');
form_agregar_clasif = document.getElementById('agregar_clasif');

if(bnt_agregar_clasif != null) {
  bnt_agregar_clasif.addEventListener('click', function (e) {
    form_agregar_clasif.classList.toggle('d-none')
  })
}

bnt_agregar_subclasif = document.getElementById('btn_agregar_subclasif');
form_agregar_subclasif = document.getElementById('agregar_subclasif');

if(bnt_agregar_subclasif != null) {
  bnt_agregar_subclasif.addEventListener('click', function (e) {
    console.log('ingreso a sublcasif')
    form_agregar_subclasif.classList.toggle('d-none')
  })
}
