<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							@if(Auth::user()->companyLogo != NULL)
							<img src="{{ Auth::user()->companyLogo }}" alt="..." class="avatar-img rounded-circle">
							@else
							<img src="{{asset('admin/assets/img/profil.jpg')}}" alt="..." class="avatar-img rounded-circle">
							@endif
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">
										@if( Auth::user()->is_admin == 0)
											Admin
										@else
											Entreprise
										@endif
									</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Tableau de bord</p>
								{{--<span class="caret"></span>--}}
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						@if(Auth::user()->is_admin == 0)
							<li class="nav-item">
								<a href="{{ route('admin.admin.index') }}">
									<i class="fas fa-desktop"></i>
									<p>Administration</p>
									<span class="badge badge-success">4</span>
								</a>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="fas fa-th-list"></i>
									<p>Localites</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ route('admin.localite.index') }}">
												<span class="sub-item">Departements</span>
											</a>
										</li>
										<li>
											<a href="{{route('admin.localite.commune')}}">
												<span class="sub-item">Communes</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarContact">
									<i class="fas fa-th-list"></i>
									<p>Contacts</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarContact">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ route('admin.contact.index') }}">
												<span class="sub-item">Contacts</span>
											</a>
										</li>
										<li>
											<a href="{{route('admin.contact.temoignage')}}">
												<span class="sub-item">Temoignages</span>
											</a>
										</li>
										<li>
											<a href="{{route('admin.contact.aboner')}}">
												<span class="sub-item">Abonnements</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarBlog">
									<i class="fas fa-th-list"></i>
									<p>Article</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarBlog">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ route('admin.blog.index') }}">
												<span class="sub-item">Article</span>
											</a>
										</li>
										<li>
											<a href="{{route('admin.category.index')}}">
												<span class="sub-item">Categorys</span>
											</a>
										</li>
										<li>
											<a href="{{route('admin.tag.index')}}">
												<span class="sub-item">Tags</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

						@endif

						@if(Auth::user()->is_admin == 1)
							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarLayouts">
									<i class="fas fa-th-list"></i>
									<p>Vos offres</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ route('admin.job.index') }}">
												<span class="sub-item">Emplois</span>
											</a>
										</li>
										<li>
											<a href="{{ route('admin.job.stage') }}">
												<span class="sub-item">Stages</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="nav-section">
								<hr>
							</li>

							<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarRecrutement">
									<i class="fas fa-th-list"></i>
									<p>Recrutements</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarRecrutement">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ route('admin.job.employe') }}">
												<span class="sub-item">Employes</span>
											</a>
										</li>
										<li>
											<a href="{{ route('admin.job.stagiare') }}">
												<span class="sub-item">Stagiares</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						@endif
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->