@extends ('layouts.app')

@section('styles')

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css"
        media="screen" charset="utf-8">


@endsection

@section('navegacion')
    @include('ui.adminNav')
@endsection


@section('content')

    <h1 class="text-2xl text-center mt-10">Nueva vacante</h1>

    <form class="max-w-lg mx-auto my-10">
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">
                Titulo Vacante:
            </label>
            <input id="titulo" type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('password') is-invalid @enderror" name="password"
                autocomplete="current-password">
        </div>
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">
                Titulo vacante:
            </label>
            <select id="categoria" class="block appearance-none w-full border
                         border-gray-200 text-gray-700 rounded 
                         leading-tigh focus:outline-none focus:bg-white 
                         focus:border-gray-500 p-3 bg-gray-100 w-full" name="categoria">
                <option disabled selected>-Selecciona-</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">
                Experiencia:
            </label>
            <select id="experiencia" class="block appearance-none w-full border
                         border-gray-200 text-gray-700 rounded 
                         leading-tigh focus:outline-none focus:bg-white 
                         focus:border-gray-500 p-3 bg-gray-100 w-full" name="experiencia">
                <option disabled selected>-Selecciona-</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-5">
            <label for="Ubicación" class="block text-gray-700 text-sm mb-2">
                Ubicación:
            </label>
            <select id="ubicacion" class="block appearance-none w-full border
                         border-gray-200 text-gray-700 rounded 
                         leading-tigh focus:outline-none focus:bg-white 
                         focus:border-gray-500 p-3 bg-gray-100 w-full" name="ubicacion">
                <option disabled selected>-Selecciona-</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                Salario:
            </label>
            <select id="salario" class="block appearance-none w-full border
                         border-gray-200 text-gray-700 rounded 
                         leading-tigh focus:outline-none focus:bg-white 
                         focus:border-gray-500 p-3 bg-gray-100 w-full" name="salario">
                <option disabled selected>-Selecciona-</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->nombre }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                Descripcion del puesto:
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 "></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mb-5">
            <label for="dropzone" class="block text-gray-700 text-sm mb-2">
                Imagen Vacante:
            </label>
            <div id="dropzoneDevJobs"
                class="dropzone rounded bg-gray-100 p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

        </div>
        <input type="hidden" name="imagen" id="imagen">

        <p id="error"></p>
        <button
            class="bg-red-400 w-full hover:bg-red-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">Publicar
            vacante</button>
    </form>


@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {

            //Medium editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                        'justifyCenter', 'justifyRigth', 'justifyFull', 'orderedList', 'unorderedList',
                        'h2', 'h3'
                    ],

                },
                placeholder: {
                    text: 'Informacion de la vacante'
                }
            });
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube aqui tu archivo',
                addRemoveLinks: true,
                acceptedFiles: '.png,.jpg,.bmp,.jpeg',
                dictRemoveFile: 'Borrar archivo',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function(file, response) {
                    document.querySelector('#error').textContent = '';
                    document.querySelector('#imagen').value = response.correcto;
                    console.log(document.querySelector('#imagen'));
                },
                error: function(file, response) {

                    document.querySelector('#error').textContent = 'Formato no válido';

                }
            });
        })
    </script>
@endsection
