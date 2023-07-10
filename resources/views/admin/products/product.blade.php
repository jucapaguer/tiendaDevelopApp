<x-layouts.admin title="Productos">

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Productos</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#formCategories" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        Agregar
                    </a>
                </p>
                <div class="collapse mb-4" id="formCategories">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="fs-4 card-title fw-bold mb-4">Nuevo producto</h3>
                            <form method="POST" action="{{ route('admin.product.create') }}" class="needs-validation"
                                novalidate="" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nombre Producto" aria-label="Nombre Producto" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="container-input">
                                            <input type="file" name="file" id="file"
                                                class="inputfile inputfile" accept="image/png, image/jpeg" required/>
                                            <label for="file">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile"
                                                    width="20" height="17" viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                                                    </path>
                                                </svg>
                                                <span class="iborrainputfile">Seleccionar imagen de producto</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <select class="form-select" name="categoria" required>
                                            <option selected>Seleccione una categoria</option>
                                            @foreach ($products->categoriesData as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="number" name="inventario" class="form-control"
                                            placeholder="Inventario" aria-label="Inventario" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="number" name="precio" class="form-control" placeholder="Precio"
                                            aria-label="Precio" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="number" name="descuento" class="form-control"
                                            placeholder="Descuento" aria-label="Descuento">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripción
                                            corta</label>
                                        <textarea class="form-control" name="shortdescription" id="shortdescription" rows="4" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripción </label>
                                        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="Atributos">Atributos</label>
                                        <div id="mAtributos">
                                            <div id="productAttributes">
                                                <div class="row mb-2">
                                                    <div class="col-md-4">
                                                        <span>Nombre</span><input type="text"
                                                            name="nombres[]" autocomplete="off" required/>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span>Decripción</span><input type="text"
                                                            name="descriptionAttribute[]" autocomplete="off" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="bi bi-plus-square-fill" id="agregar"
                                                style="font-size: 15px"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12 textaling">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <table id="productsTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Inventario</th>
                                    <th>Precio regular</th>
                                    <th>Descuento</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->categorieData[0]->name }}</td>
                                        <td>{{ $value->inventory }}</td>
                                        <td>{{ $value->price }}</td>
                                        <td>{{ $value->sale_price }}</td>
                                        <td class="opciones">
                                            <a id="edit" href="#formCategoriesEdit"
                                                data-data="{{ json_encode($value) }}" data-bs-toggle="modal"
                                                data-bs-target="#productDetails"><i class="bi bi-eye-fill"></i></a>
                                            <form method="POST"
                                                action="{{ route('admin.product.delete', $value->id) }}"
                                                class="needs-validation" novalidate="" autocomplete="off">
                                                @csrf
                                                <button type="submit" class="">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Inventario</th>
                                    <th>Precio regular</th>
                                    <th>Descuento</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productDetails" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row">
                        <div class="col-md-6">
                            <img id="mPicture" src="..." alt="Foto producto">
                        </div>
                        <div class="col-md-6">
                            <p id="mName"></p>
                            
                            <label for="Categoria">Categoria</label>
                            <p id="mCategoria"></p>

                            <label for="Inventario">Inventario</label>
                            <p id="mInventario"></p>

                            <label for="Precio">Precio</label>
                            <p id="mPrecio"></p>

                            <label for="Descuento">Descuento</label>
                            <p id="mDescuento"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="Descripción corta">Descripción corta</label>
                            <p id="mShortDescription"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="Descripción">Descripción</label>
                            <p id="mDescription"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="Atributos">Atributos</label>
                            <div id="mAtributos"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const productDetails = document.getElementById('productDetails')
        if (productDetails) {
            productDetails.addEventListener('show.bs.modal', event => {
                const datos = JSON.parse(event.relatedTarget.getAttribute('data-data'))

                console.log(datos);

                productDetails.querySelector('.modal-body img').src = datos.picture;
                productDetails.querySelector('.modal-body #mName').textContent = datos.name;
                productDetails.querySelector('.modal-body #mCategoria').textContent = datos.categorieData[0].name;
                productDetails.querySelector('.modal-body #mInventario').textContent = datos.inventory;
                productDetails.querySelector('.modal-body #mPrecio').textContent = datos.price;
                productDetails.querySelector('.modal-body #mDescuento').textContent = datos.sale_price;
                productDetails.querySelector('.modal-body #mShortDescription').textContent = datos
                .short_description;
                productDetails.querySelector('.modal-body #mDescription').textContent = datos.description;

                datos.additionalData.forEach(item => {

                    var element = document.createElement("p");
                    element.textContent = item.name+": "+item.description;

                    productDetails.querySelector('.modal-body #mAtributos').appendChild(element);
                });

            })
        }

        var inputs = document.querySelectorAll('.inputfile');
        Array.prototype.forEach.call(inputs, function(input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function(e) {
                var fileName = '';
                fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });

        const btn_agregar = document.getElementById('agregar');
        btn_agregar.addEventListener("click", function() {
            const div_principal = D.create('div');
            div_principal.className = "row";

            const div_nombre = D.create('div');
            div_nombre.className = "col-md-4 mb-2";

            const div_description = D.create('div');
            div_description.className = "col-md-7 mb-2";

            const div_delete = D.create('div');
            div_delete.className = "col-md-1 mb-2";

            const input_nombre = D.create('input', {
                type: 'text',
                name: 'nombres[]',
                autocomplete: 'off',
                placeholder: 'Nombre'
            });

            const input_description = D.create('input', {
                type: 'text',
                name: 'descriptionAttribute[]',
                autocomplete: 'off',
                placeholder: 'Descripción'
            });

            const borrar = D.create('a', {
                href: 'javascript:void(0)',
                innerHTML: '<i class="bi bi-trash-fill"></i>',
                onclick: function() {
                    D.remove(div_principal);
                }
            });

            D.append(input_nombre, div_nombre);
            D.append(borrar, div_delete);

            D.append([input_description], div_description);

            D.append([div_nombre, div_description, div_delete], div_principal);

            D.append(div_principal, D.id('productAttributes'));
        });

        const DOM = function() {
            this.id = str => document.getElementById(str);
            this.query = (regla_css, one = false) =>
                one === true ?
                document.querySelector(regla_css) :
                document.querySelectorAll(regla_css);


            this.create = (str, props = {}) => Object.assign(document.createElement(str), props);

            this.append = (hijos, padre = document.body) => {
                hijos.length ?
                    hijos.map(hijo => padre.appendChild(hijo)) :
                    padre.appendChild(hijos);
            }

            this.remove = e => e.remove();
        }

        const D = new DOM();
    </script>



    </x-layout>
