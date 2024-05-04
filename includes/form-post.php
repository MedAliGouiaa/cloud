<?php include "conn.php"; ?>
<div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2"
                            style="width: 66%;margin-top: 22px;">
                            <div class="gx-forum-post gx-card p-24">
                                <div class="gx-inner-form">
                                    <h4 class="main-heding mt-0">Démarrer ma propre discussion
                                        :</h4>
                                    <p >Initiez de nouvelles conversations et
                                        partagez vos idées avec notre communauté. Lancez une discussion, posez des
                                        questions, ou montrez votre point de vue sur un sujet .</p>
                                    <form class="gx-form">
                                        <div class="form-field">
                                            <div class="br-select">
                                                <div class="br-input">
                                                    <label class="label-heading">Sélectionner une catégorie</label>
                                                    <br>
                                                    <div id="id_filter_1" class="drop-down">
                                                        <div class="header">
                                                            <div class="filter_selected"></div>
                                                            <i class="ri-arrow-drop-down-line"></i>
                                                        </div>
                                                        <div class="filters">
                                                            <div class="filter">--</div>
                                                            <div class="filter">Sociale</div>
                                                            <div class="filter">Législatif</div>
                                                            <div class="filter">Psycologique</div>
                                                            <div class="filter">Post</div>
                                                            <div class="filter">Autre</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="autreInput" class="form-field hidden">
                                            <label for="autre">Nommez votre nouvelle catégorie</label>
                                            <input type="text" id="autre" name="autre">
                                        </div>

                                        <script>
                                            var filterDropdown = document.getElementById("id_filter_1");
                                            var autreInput = document.getElementById("autreInput");

                                            filterDropdown.addEventListener("click", function (event) {
                                                var selectedFilter = event.target.innerText.trim();
                                                if (selectedFilter === "Autre") {
                                                    autreInput.classList.remove("hidden");
                                                } else {
                                                    autreInput.classList.add("hidden");
                                                }
                                            });

                                            // Add click event listeners to all filter options to update the selected filter
                                            var filters = document.querySelectorAll(".filter");
                                            filters.forEach(function (filter) {
                                                filter.addEventListener("click", function (event) {
                                                    document.querySelector(".filter_selected").innerText = event.target.innerText;
                                                });
                                            });
                                        </script>

                                        <div class="form-field">
                                            <label class="label-heading">Titre de discussion</label>
                                            <br>
                                            <input type="text" name="title"
                                                placeholder="De quoi s'agit dans cette discussion en une courte phrase ?">
                                        </div>
                                        <div class="form-field">
                                            <label class="label-heading">description de discussion</label>
                                            <br>
                                            <textarea id="rules" placeholder="Fournir une description détaillée..."></textarea>
                                        </div>
                                        <div class="form-field-buttons">
                                            <button type="button" class="gx-btn-primary gx-model">
                                                Publier
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
            </div>
        </div>
        <script src="../js/vendor/jquery-3.6.4.min.js"></script>
<script src="../js/vendor/bootstrap.bundle.min.js"></script>
<script src="../js/vendor/prism.js"></script>
<!-- Main Custom -->
<script src="../js/main.js"></script>
<script src="javascripts.js"></script>
                                        </div>