<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="dashboard-page">

        <div class="tactyra-container">

            <div class="dashboard-top">

                <!-- FORMULARIO -->

                <div class="card">

                    <h2>Añadir jugador</h2>

                    <form action="{{ route('players.store') }}" method="POST">
                        @csrf

                        <input type="text" name="name" placeholder="Nombre jugador" required>

                        <input type="number" name="number" placeholder="Dorsal (opcional)">

                        <!-- CLUB CON AUTOCOMPLETADO -->

                        <input type="text" name="club" placeholder="Club" list="clubs" required>

                        <datalist id="clubs">

                            @foreach ($clubs as $club)
                                <option value="{{ $club }}"></option>
                            @endforeach

                        </datalist>
                        <select name="category" id="edit_category">

                            <option value="">Seleccionar categoría</option>
                            <option value="Baby">Baby</option>
                            <option value="Prebenjamín">Prebenjamín</option>
                            <option value="Benjamín">Benjamín</option>
                            <option value="Alevín">Alevín</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Cadete">Cadete</option>
                            <option value="Juvenil">Juvenil</option>
                            <option value="Senior">Senior</option>


                        </select>


                        <select name="position" required>

                            <option value="">Seleccionar posición</option>
                            <option value="Portero">Portero</option>
                            <option value="Lateral Derecho">Lateral Derecho</option>
                            <option value="Lateral Izquierdo">Lateral Izquierdo</option>
                            <option value="Defensa Central">Defensa Central</option>
                            <option value="Mediocentro">Mediocentro</option>
                            <option value="Mediapunta">Mediapunta</option>
                            <option value="Extremo Derecho">Extremo Derecho</option>
                            <option value="Extremo Izquierdo">Extremo Izquierdo</option>
                            <option value="Delantero">Delantero</option>

                        </select>

                        <input type="number" name="age" placeholder="Edad">

                        <h3>Habilidades</h3>

                        <div class="skills">

                            <input type="number" name="speed" placeholder="Velocidad">
                            <input type="number" name="passing" placeholder="Pase">
                            <input type="number" name="shooting" placeholder="Tiro">
                            <input type="number" name="defense" placeholder="Defensa">
                            <input type="number" name="physical" placeholder="Físico">

                        </div>

                        <button type="submit" class="btn-green">
                            Guardar jugador
                        </button>

                    </form>

                </div>


                <!-- ESTADISTICAS -->

                <div class="card">

                    <h2>Estadísticas</h2>

                    <div class="stat-box">

                        <p>Total jugadores</p>

                        <h3>{{ $players->count() }}</h3>

                    </div>

                </div>

            </div>



            <!-- TABLA -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Nombre</th>
                            <th>Club</th>
                            <th>Posición</th>
                            <th>Dorsal</th>
                            <th>Edad</th>
                            <th>Categoría</th>
                            <th>Vel</th>
                            <th>Pase</th>
                            <th>Tiro</th>
                            <th>Def</th>
                            <th>Fís</th>
                            <th>Media</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($players as $player)
                                                    <tr>

                                                        <td>{{ $player->name }}</td>
                                                        <td>{{ $player->club }}</td>
                                                        <td>{{ $player->position }}</td>
                                                        <td>{{ $player->number ?? '-' }}</td>
                                                        <td>{{ $player->age }}</td>
                                                        <td>{{ $player->category }}</td>
                                                        <td>{{ $player->speed }}</td>
                                                        <td>{{ $player->passing }}</td>
                                                        <td>{{ $player->shooting }}</td>
                                                        <td>{{ $player->defense }}</td>
                                                        <td>{{ $player->physical }}</td>

                                                        <td class="overall">
                                                            {{ $player->overall }}
                                                        </td>

                                                        <td class="actions">

                                                            <button class="btn-icon edit" onclick='openEditModal(
                            {{ $player->id }},
                            @json($player->name),
                            @json($player->club),
                            @json($player->category),
                            @json($player->position),
                            {{ $player->number ?? 'null' }},
                            {{ $player->age ?? 'null' }}
                            )'>

                                                                ✏

                                                            </button>

                                                            <button class="btn-icon delete" onclick="openDeleteModal({{ $player->id }})">

                                                                🗑

                                                            </button>

                                                        </td>

                                                    </tr>

                        @empty

                            <tr>

                                <td colspan="12">
                                    No hay jugadores registrados
                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>



        <!-- MODAL EDITAR -->

        <div id="editModal" class="modal">

            <div class="modal-content">

                <span class="close" onclick="closeEditModal()">✖</span>

                <h2>Editar jugador</h2>

                <form id="editForm" method="POST">

                    @csrf
                    @method('PUT')

                    <input type="text" name="name" id="edit_name">
                    <input type="number" name="number" id="edit_number">
                    <input type="text" name="club" id="edit_club">
                    <select name="category" id="edit_category">


                        <option value="Baby">Baby</option>
                        <option value="Prebenjamín">Prebenjamín</option>
                        <option value="Benjamín">Benjamín</option>
                        <option value="Alevín">Alevín</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Cadete">Cadete</option>
                        <option value="Juvenil">Juvenil</option>
                        <option value="Senior">Senior</option>


                    </select>

                    <select name="position" id="edit_position">

                        <option value="Portero">Portero</option>
                        <option value="Lateral Derecho">Lateral Derecho</option>
                        <option value="Lateral Izquierdo">Lateral Izquierdo</option>
                        <option value="Defensa Central">Defensa Central</option>
                        <option value="Mediocentro">Mediocentro</option>
                        <option value="Mediapunta">Mediapunta</option>
                        <option value="Extremo Derecho">Extremo Derecho</option>
                        <option value="Extremo Izquierdo">Extremo Izquierdo</option>
                        <option value="Delantero">Delantero</option>

                    </select>

                    <input type="number" name="age" id="edit_age">

                    <button type="submit" class="btn-green">
                        Guardar cambios
                    </button>

                </form>

            </div>

        </div>



        <!-- MODAL ELIMINAR -->

        <div id="deleteModal" class="delete-modal">

            <div class="delete-modal-box">

                <div class="delete-icon">⚠</div>

                <h2>Eliminar jugador</h2>

                <p>¿Estás seguro de que deseas eliminar este jugador?</p>

                <div class="delete-actions">

                    <button class="btn-cancel" onclick="closeDeleteModal()">
                        Cancelar
                    </button>

                    <form id="deleteForm" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            Sí, eliminar
                        </button>

                    </form>

                </div>

            </div>

        </div>



        <script>
            function openEditModal(id, name, club, category, position, number, age) {

                let modal = document.getElementById("editModal");

                modal.style.display = "flex";

                document.getElementById("edit_name").value = name ?? "";
                document.getElementById("edit_number").value = number ?? "";
                document.getElementById("edit_club").value = club ?? "";
                document.getElementById("edit_position").value = position ?? "";
                document.getElementById("edit_age").value = age ?? "";

                document.getElementById("editForm").action = "/players/" + id;

            }

            function closeEditModal() {
                document.getElementById("editModal").style.display = "none";
            }

            function openDeleteModal(id) {

                let modal = document.getElementById("deleteModal");

                modal.style.display = "flex";

                document.getElementById("deleteForm").action = "/players/" + id;

            }

            function closeDeleteModal() {
                document.getElementById("deleteModal").style.display = "none";
            }

            window.onclick = function (event) {

                let editModal = document.getElementById("editModal");
                let deleteModal = document.getElementById("deleteModal");

                if (event.target == editModal) {
                    editModal.style.display = "none";
                }

                if (event.target == deleteModal) {
                    deleteModal.style.display = "none";
                }

            }
        </script>

    </div>

</x-app-layout>