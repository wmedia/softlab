<?php
//Include Common Files @1-7823571B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "add_precios_test_insert.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordprecios_test { //precios_test Class @2-0215D9F2

//Variables @2-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @2-77315B5F
    function clsRecordprecios_test($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record precios_test/Error";
        $this->DataSource = new clsprecios_testDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "precios_test";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->prevision_aplicar_id = new clsControl(ccsListBox, "prevision_aplicar_id", "Previsión a aplicar", ccsText, "", CCGetRequestParam("prevision_aplicar_id", $Method, NULL), $this);
            $this->prevision_aplicar_id->DSType = dsTable;
            $this->prevision_aplicar_id->DataSource = new clsDBDatos();
            $this->prevision_aplicar_id->ds = & $this->prevision_aplicar_id->DataSource;
            $this->prevision_aplicar_id->DataSource->SQL = "SELECT * \n" .
"FROM previsiones {SQL_Where} {SQL_OrderBy}";
            $this->prevision_aplicar_id->DataSource->Order = "nom_prevision";
            list($this->prevision_aplicar_id->BoundColumn, $this->prevision_aplicar_id->TextColumn, $this->prevision_aplicar_id->DBFormat) = array("prevision_id", "nom_prevision", "");
            $this->prevision_aplicar_id->DataSource->Parameters["urlactivo"] = CCGetFromGet("activo", NULL);
            $this->prevision_aplicar_id->DataSource->wp = new clsSQLParameters();
            $this->prevision_aplicar_id->DataSource->wp->AddParameter("1", "urlactivo", ccsText, "", "", $this->prevision_aplicar_id->DataSource->Parameters["urlactivo"], 'V', false);
            $this->prevision_aplicar_id->DataSource->wp->Criterion[1] = $this->prevision_aplicar_id->DataSource->wp->Operation(opEqual, "activo", $this->prevision_aplicar_id->DataSource->wp->GetDBValue("1"), $this->prevision_aplicar_id->DataSource->ToSQL($this->prevision_aplicar_id->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->prevision_aplicar_id->DataSource->Where = 
                 $this->prevision_aplicar_id->DataSource->wp->Criterion[1];
            $this->prevision_aplicar_id->DataSource->Order = "nom_prevision";
            $this->prevision_aplicar_id->Required = true;
            $this->prevision_base_id = new clsControl(ccsListBox, "prevision_base_id", "Previsión base", ccsInteger, "", CCGetRequestParam("prevision_base_id", $Method, NULL), $this);
            $this->prevision_base_id->DSType = dsTable;
            $this->prevision_base_id->DataSource = new clsDBDatos();
            $this->prevision_base_id->ds = & $this->prevision_base_id->DataSource;
            $this->prevision_base_id->DataSource->SQL = "SELECT * \n" .
"FROM previsiones {SQL_Where} {SQL_OrderBy}";
            $this->prevision_base_id->DataSource->Order = "nom_prevision";
            list($this->prevision_base_id->BoundColumn, $this->prevision_base_id->TextColumn, $this->prevision_base_id->DBFormat) = array("prevision_id", "nom_prevision", "");
            $this->prevision_base_id->DataSource->Parameters["urlactivo"] = CCGetFromGet("activo", NULL);
            $this->prevision_base_id->DataSource->wp = new clsSQLParameters();
            $this->prevision_base_id->DataSource->wp->AddParameter("1", "urlactivo", ccsText, "", "", $this->prevision_base_id->DataSource->Parameters["urlactivo"], 'V', false);
            $this->prevision_base_id->DataSource->wp->Criterion[1] = $this->prevision_base_id->DataSource->wp->Operation(opEqual, "activo", $this->prevision_base_id->DataSource->wp->GetDBValue("1"), $this->prevision_base_id->DataSource->ToSQL($this->prevision_base_id->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->prevision_base_id->DataSource->Where = 
                 $this->prevision_base_id->DataSource->wp->Criterion[1];
            $this->prevision_base_id->DataSource->Order = "nom_prevision";
            $this->prevision_base_id->Required = true;
            $this->procedencia_base_id = new clsControl(ccsListBox, "procedencia_base_id", "procedencia_base_id", ccsInteger, "", CCGetRequestParam("procedencia_base_id", $Method, NULL), $this);
            $this->procedencia_base_id->DSType = dsTable;
            $this->procedencia_base_id->DataSource = new clsDBDatos();
            $this->procedencia_base_id->ds = & $this->procedencia_base_id->DataSource;
            $this->procedencia_base_id->DataSource->SQL = "SELECT * \n" .
"FROM procedencias {SQL_Where} {SQL_OrderBy}";
            list($this->procedencia_base_id->BoundColumn, $this->procedencia_base_id->TextColumn, $this->procedencia_base_id->DBFormat) = array("procedencia_id", "nom_procedencia", "");
            $this->factor = new clsControl(ccsTextBox, "factor", "Factor", ccsFloat, "", CCGetRequestParam("factor", $Method, NULL), $this);
            $this->factor->Required = true;
            $this->procedencia_id = new clsControl(ccsListBox, "procedencia_id", "Procedencia", ccsInteger, "", CCGetRequestParam("procedencia_id", $Method, NULL), $this);
            $this->procedencia_id->DSType = dsTable;
            $this->procedencia_id->DataSource = new clsDBDatos();
            $this->procedencia_id->ds = & $this->procedencia_id->DataSource;
            $this->procedencia_id->DataSource->SQL = "SELECT * \n" .
"FROM procedencias {SQL_Where} {SQL_OrderBy}";
            $this->procedencia_id->DataSource->Order = "nom_procedencia";
            list($this->procedencia_id->BoundColumn, $this->procedencia_id->TextColumn, $this->procedencia_id->DBFormat) = array("procedencia_id", "nom_procedencia", "");
            $this->procedencia_id->DataSource->Order = "nom_procedencia";
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->procedencia_id->Value) && !strlen($this->procedencia_id->Value) && $this->procedencia_id->Value !== false)
                    $this->procedencia_id->SetText(0);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-B4D56AEF
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlprecio_test_id"] = CCGetFromGet("precio_test_id", NULL);
    }
//End Initialize Method

//Validate Method @2-0B3720BC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->prevision_aplicar_id->Validate() && $Validation);
        $Validation = ($this->prevision_base_id->Validate() && $Validation);
        $Validation = ($this->procedencia_base_id->Validate() && $Validation);
        $Validation = ($this->factor->Validate() && $Validation);
        $Validation = ($this->procedencia_id->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->prevision_aplicar_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->prevision_base_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->procedencia_base_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->factor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->procedencia_id->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-4BC7D176
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->prevision_aplicar_id->Errors->Count());
        $errors = ($errors || $this->prevision_base_id->Errors->Count());
        $errors = ($errors || $this->procedencia_base_id->Errors->Count());
        $errors = ($errors || $this->factor->Errors->Count());
        $errors = ($errors || $this->procedencia_id->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-0B250066
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Cancel" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = "add_precios_test_insert.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @2-C4F8CD65
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->prevision_aplicar_id->SetValue($this->prevision_aplicar_id->GetValue(true));
        $this->DataSource->prevision_base_id->SetValue($this->prevision_base_id->GetValue(true));
        $this->DataSource->procedencia_base_id->SetValue($this->procedencia_base_id->GetValue(true));
        $this->DataSource->factor->SetValue($this->factor->GetValue(true));
        $this->DataSource->procedencia_id->SetValue($this->procedencia_id->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-E105C057
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->prevision_aplicar_id->SetValue($this->prevision_aplicar_id->GetValue(true));
        $this->DataSource->prevision_base_id->SetValue($this->prevision_base_id->GetValue(true));
        $this->DataSource->procedencia_base_id->SetValue($this->procedencia_base_id->GetValue(true));
        $this->DataSource->factor->SetValue($this->factor->GetValue(true));
        $this->DataSource->procedencia_id->SetValue($this->procedencia_id->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-624C20C5
    function Show()
    {
        global $CCSUseAmp;
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->prevision_aplicar_id->Prepare();
        $this->prevision_base_id->Prepare();
        $this->procedencia_base_id->Prepare();
        $this->procedencia_id->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->prevision_aplicar_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->prevision_base_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->procedencia_base_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->factor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->procedencia_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->prevision_aplicar_id->Show();
        $this->prevision_base_id->Show();
        $this->procedencia_base_id->Show();
        $this->factor->Show();
        $this->procedencia_id->Show();
        $this->Button_Insert->Show();
        $this->Button_Cancel->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End precios_test Class @2-FCB6E20C

class clsprecios_testDataSource extends clsDBDatos {  //precios_testDataSource Class @2-DC2539EE

//DataSource Variables @2-D4EB5F9A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $prevision_aplicar_id;
    public $prevision_base_id;
    public $procedencia_base_id;
    public $factor;
    public $procedencia_id;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-ABAB5E6B
    function clsprecios_testDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record precios_test/Error";
        $this->Initialize();
        $this->prevision_aplicar_id = new clsField("prevision_aplicar_id", ccsText, "");
        
        $this->prevision_base_id = new clsField("prevision_base_id", ccsInteger, "");
        
        $this->procedencia_base_id = new clsField("procedencia_base_id", ccsInteger, "");
        
        $this->factor = new clsField("factor", ccsFloat, "");
        
        $this->procedencia_id = new clsField("procedencia_id", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-C700F32D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlprecio_test_id", ccsInteger, "", "", $this->Parameters["urlprecio_test_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "precio_test_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-9741CE61
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM precios_test {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-BAF0975B
    function SetValues()
    {
    }
//End SetValues Method

//Insert Method @2-9B743BAF
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->SQL = CCBuildInsert("precios_test", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-5A8A6601
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->SQL = CCBuildUpdate("precios_test", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-10F5D0D0
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM precios_test";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End precios_testDataSource Class @2-FCB6E20C

//Initialize Page @1-A45511A9
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "add_precios_test_insert.html";
$BlockToParse = "main";
$TemplateEncoding = "ISO-8859-1";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "iso-8859-1";
//End Initialize Page

//Authenticate User @1-1C6D62C5
CCSecurityRedirect("16;17;18;19;20", "error_nivel.php");
//End Authenticate User

//Include events file @1-F3B8F560
include_once("./add_precios_test_insert_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-940A6A16
$DBDatos = new clsDBDatos();
$MainPage->Connections["Datos"] = & $DBDatos;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$precios_test = new clsRecordprecios_test("", $MainPage);
$MainPage->precios_test = & $precios_test;
$precios_test->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-5D816F46
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "ISO-8859-1", "replace");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "ISO-8859-1", "replace");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-DF795B0A
$precios_test->Operation();
//End Execute Components

//Go to destination page @1-A5351C7F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBDatos->close();
    header("Location: " . $Redirect);
    unset($precios_test);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-407561D1
$precios_test->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$main_block = CCConvertEncoding($main_block, $FileEncoding, $CCSLocales->GetFormatInfo("Encoding"));
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0622CB97
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBDatos->close();
unset($precios_test);
unset($Tpl);
//End Unload Page


?>
