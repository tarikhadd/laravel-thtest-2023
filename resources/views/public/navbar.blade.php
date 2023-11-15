<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <button 
            class="navbar-toggler" 
            type="button" 
            (click)="open(content)"
            >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/apis">Api-s</a>
                </li>
            </ul>
            <span class="navbar-text p-0" (click)="open(content)">
                <a class="nav-link" href="/login">Login</a>
            </span>
        </div>
        
    </div>
</nav>

{{-- <ng-template #content let-offcanvas>
    <div class="offcanvas-header d-flex align-items-center">
        <div class="offcanvas-title">
            <div class="navbar-brand">
                <img (click)="openModal(modalContent)" src="https://capacitorjs.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo.c98ab1de.png&w=1080&q=75" style="height: 50px;" alt="">
            </div>
        </div>
        <button type="button" class="btn-close" aria-label="Close" (click)="offcanvas.dismiss('Cross click')"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" [routerLink]="'home'" [routerLinkActive]="'active'" (click)="close()">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" [routerLink]="'products'" [routerLinkActive]="'active'" (click)="close()">Products</a>
            </li>
        </ul>
    </div>
    <div>
       <p class="text-center">Angular app powered by Capacitor</p>
    </div>
</ng-template>


<ng-template #modalContent let-modal>
	<div class="modal-header">
		<h4 class="modal-title" id="modal-basic-title">Are you sure you want to leave this app?</h4>
	</div>
	<div class="modal-footer">
		<a type="button" href="https://capacitorjs.com/solution/angular" class="btn btn-outline-primary" (click)="modal.close('Save click')">Yes</a>
        <button type="button" class="btn btn-outline-danger" (click)="modal.close('Save click')">No</button>
	</div>
</ng-template> --}}