<style>
    #root * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #root {
        padding: 8px 12px;
        margin: 4px auto;
        width: 768px;
        height: 606px;
        border: 2pt solid #333;
        border-radius: 12pt;
        /*background-color: #888;*/
    }

    #root #footer {
        text-align: center;

        color: #fff;
        background-color: #2a6496;

        font-size: 11pt;
        line-height: 11pt;
        font-weight: bold;
        font-family: 'Century Gothic', sans-serif;
        text-decoration: none;

        padding: 4px;

        margin-top: 48px;

        border-radius: 16px;
    }

    #root #footer a:hover {
        color: #fff !important;
    }

    #root #footer div span {
        text-decoration: underline;
        cursor: pointer;
    }

    #root #content {
        position: relative;

        margin: 0;
        padding: 4pt 12pt;

        width: 100%;
        height: 475px;


    }

    #root #content .heading {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }

    #root #content .heading .error-403 {
        position: relative;
        height: 200px;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        z-index: 1;
    }

    #root #content .heading .error-403 h1 {
        font-family: 'Century Gothic', sans-serif;
        color: #aabbcc;
        font-weight: 900;
        font-size: 276px;
        margin: 0;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    #root #content .body {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center !important;
        padding-left: 15px;
        padding-right: 15px;
        margin: 8px auto !important;
        z-index: 12;
    }

    #root .container .foreground > div {

    }

    #root #content .body div h2 {
        font-family: 'Century Gothic', sans-serif;
        font-size: 32pt;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0;
        z-index: 3;
    }

    #root #content .body h4 {
        font-family: 'Calibri', sans-serif;
        font-size: 24pt;
        line-height: 24pt;
        color: #000;
        font-weight: 600;
        /*text-transform: uppercase;*/
        margin: 0 0 8px;
        z-index: 3;
    }

    #root #content .body p {
        font-family: 'Calibri', sans-serif;
        font-size: 16pt;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
        z-index: 3;
    }

    #root #content .body button {
        font-family: 'Century Gothic', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        display: inline-block;
        padding: 16px 38px;
        font-weight: 400;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    #root #content .body button.first {
        background: #dc3545;
        color: #fff;
    }

    #root #content .body button.first:hover {
        background-color: #fff;
        border-color: #dc3540;
        color: #dc3545;
    }

    #root #content .body button.second {
        background: #28a745;
        color: #fff;
    }

    #root #content .body button.second:hover {
        background-color: #fff;
        border-color: #28a740;
        color: #28a745;
    }

    .badge {
        border: 2px solid transparent;
        border-radius: 40px;
    }
</style>
<div id="root">
    <div id="header">

    </div>
    <div id="content">
        <div class="heading">
            <div class="error-403">
                <h1>403</h1>
            </div>
        </div>
        <div class="body">
            <div style="display: flex !important; flex-direction: column !important;">
                <h2>We are sorry, ACCESS DENIED!</h2>
                @if (isset($error))
                    <h4 style="color: #f44336;">{{$error}}</h4>
                @else
                    <h4>You don't have sufficient privileges to access this data.</h4>
                @endif

                @if (isset($emergency_access) && $emergency_access)
                    <p>It seems like you can access this data in emergency access cases.</p>
                @endif
                <div>
                    <button class="badge second"
                            onclick="window.history.back()"
                    >Back
                    </button>
                    @if (isset($emergency_access) && $emergency_access)
                        <button class="badge first"
                                onclick="let req=new XMLHttpRequest();req.open('POST', 'localhost:5555/api/requests/{{$record_id}}/OK');req.send();localStorage.setItem('toggle', 'true');window.location.reload();
                                        ">Emergency Access
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div>
            Access to this site's data is controlled by
            <div>
                <a href="http://localhost:5555/">Dynamic Medical Record <br> Access Policies</a>
            </div>
            &copy; 2019
        </div>
    </div>
</div>
