<x-layouts.admin title="Categoria Producto">

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Categorias</h3>
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
                            <h4 class="fs-4 card-title fw-bold mb-4">Nueva categoria</h4>
                            <form method="POST" action="{{ route('admin.categorie.create') }}" class="needs-validation"
                                novalidate="" autocomplete="off">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre"
                                            aria-label="Nombre" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary ms-auto" style="width: 100% !important;">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="formCategoriesEdit">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4 class="fs-4 card-title fw-bold mb-4">Editar categoria</h4>
                            <form method="POST" action="{{ route('admin.categorie.update') }}" class="needs-validation"
                                novalidate="" autocomplete="off">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-10">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Nombre" aria-label="Nombre">
                                        <input type="hidden" name="id" id="id" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary ms-auto" style="width: 100%">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <table id="categoriesTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Slug</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->slug }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td class="opciones">
                                            <a id="edit" href="#formCategoriesEdit" data-id="{{ $value->id }}"
                                                data-name="{{ $value->name }}" data-bs-toggle="collapse"><i class="bi bi-pencil-square"></i></a>
                                            <form method="POST"
                                                action="{{ route('admin.categorie.delete', $value->id) }}"
                                                class="needs-validation" novalidate="" autocomplete="off">
                                                @csrf
                                                <button type="submit" class="btn btn-primary ms-auto">
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
                                    <th>Slug</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('edit').addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
        });
    </script>

    </x-layout>
