<?php

class PenyakitSeeder extends Seeder
{

    private $table = 'penyakit';

    public function run()
    {
        $penyakit = array(
            "Cancer" => array(
                ["name" => "Bone Cancer", "abbr" => "BoC", "code" => "269466003", "system" => "SNOMED_CT"],
                ["name" => "Brain Cancer", "abbr" => "BrC", "code" => "1000000", "system" => "SNOMED_CT"],
                ["name" => "Breast Cancer", "abbr" => "BrC", "code" => "254837009", "system" => "SNOMED_CT"],
                ["name" => "Colon Cancer", "abbr" => "ColC", "code" => "363406005", "system" => "SNOMED_CT"],
                ["name" => "Colorectal Cancer", "abbr" => "CrC", "code" => "1000001", "system" => "SNOMED_CT"],
                ["name" => "Esophageal Cancer", "abbr" => "EsC", "code" => "363402007", "system" => "SNOMED_CT"],
                ["name" => "Familial adnenomatous polyposis (FAP)", "abbr" => "FAP", "code" => "72900001", "system" => "SNOMED_CT"],
                ["name" => "Gastric Cancer", "abbr" => "GaC", "code" => "363349007", "system" => "SNOMED_CT"],
                ["name" => "Kidney Cancer", "abbr" => "KiC", "code" => "363518003", "system" => "SNOMED_CT"],
                ["name" => "Leukemia", "abbr" => "Leu", "code" => "93143009", "system" => "SNOMED_CT"],
                ["name" => "Liver Cancer", "abbr" => "LiC", "code" => "93870000", "system" => "SNOMED_CT"],
                ["name" => "Lung Cancer", "abbr" => "LuC", "code" => "363358000", "system" => "SNOMED_CT"],
                ["name" => "Muscle Cancer", "abbr" => "MuC", "code" => "363495004", "system" => "SNOMED_CT"],
                ["name" => "Other Cancer", "abbr" => "OtC", "code" => "OTCANCER", "system" => "SNOMED_CT"],
                ["name" => "Ovarian Cancer", "abbr" => "OvC", "code" => "363443007", "system" => "SNOMED_CT"],
                ["name" => "Pancreatic Cancer", "abbr" => "PnC", "code" => "363418001", "system" => "SNOMED_CT"],
                ["name" => "Prostate Cancer", "abbr" => "PrC", "code" => "399068003", "system" => "SNOMED_CT"],
                ["name" => "Rectal Cancer", "abbr" => "ReC", "code" => "254582000", "system" => "SNOMED_CT"],
                ["name" => "Skin Cancer", "abbr" => "SkC", "code" => "372130007", "system" => "SNOMED_CT"],
                ["name" => "Thyroid Cancer", "abbr" => "ThC", "code" => "363478007", "system" => "SNOMED_CT"],
                ["name" => "Unknown Cancer", "abbr" => "UnC", "code" => "UNCANCER", "system" => "SNOMED_CT"],
                ["name" => "Uterine Cancer", "abbr" => "UtC", "code" => "371973000", "system" => "SNOMED_CT"]
            ),
            "Clotting Disorder" => array(
                ["name" => "Clotting Disorder", "abbr" => "ClD", "code" => "4779008", "system" => "SNOMED_CT"],
                ["name" => "Deep Vein Thrombosis (DVT)", "abbr" => "DVT", "code" => "128053003", "system" => "SNOMED_CT"],
                ["name" => "Pulmonary Embolism", "abbr" => "PuE", "code" => "59282003", "system" => "SNOMED_CT"],
                ["name" => "Unknown Clotting Disorder", "abbr" => "UCD", "code" => "UNCLODIS", "system" => "SNOMED_CT"]
            ),
            "Dementia/Alzheimers" => array(
                ["name" => "Dementia/Alzheimer's", "abbr" => "Alz", "code" => "26929004", "system" => "SNOMED_CT"]
            ),
            "Diabetes" => array(
                ["name" => "Diabetes", "abbr" => "DIAB", "code" => "73211009", "system" => "SNOMED_CT"],
                ["name" => "Gestational Diabetes", "abbr" => "Gest", "code" => "11687002", "system" => "SNOMED_CT"],
                ["name" => "Impaired Fasting Glucose", "abbr" => "IFG", "code" => "82141001", "system" => "SNOMED_CT"],
                ["name" => "Impaired Glucose Tolerance", "abbr" => "IGT", "code" => "9414007", "system" => "SNOMED_CT"],
                ["name" => "Insulin Resistance", "abbr" => "INR", "code" => "32284009", "system" => "SNOMED_CT"],
                ["name" => "Maturity Onset Diabetes mellitus in Young (MODY)", "abbr" => "MODY", "code" => "472972006", "system" => "SNOMED_CT"],
                ["name" => "Pre-Diabetes", "abbr" => "PreD", "code" => "PREDIABE", "system" => "SNOMED_CT"],
                ["name" => "Type 1 Diabetes", "abbr" => "DIA1", "code" => "46635009", "system" => "SNOMED_CT"],
                ["name" => "Type 2 Diabetes", "abbr" => "DIA2", "code" => "44054006", "system" => "SNOMED_CT"],
                ["name" => "Unknown Diabetes", "abbr" => "UDI", "code" => "UNDIABET", "system" => "SNOMED_CT"]
            ),
            "Gastrointestinal Disorder" => array(
                ["name" => "Colon Polyp", "abbr" => "GI", "code" => "68496003", "system" => "SNOMED_CT"],
                ["name" => "Crohn's Disease", "abbr" => "Crd", "code" => "34000006", "system" => "SNOMED_CT"],
                ["name" => "Familial adnenomatous polyposis (FAP)", "abbr" => "FAP", "code" => "72900002", "system" => "SNOMED_CT"],
                ["name" => "Gastrointestinal Disorder", "abbr" => "GI", "code" => "119292006", "system" => "SNOMED_CT"],
                ["name" => "Irritable Bowel Syndrome", "abbr" => "IBS", "code" => "10743008", "system" => "SNOMED_CT"],
                ["name" => "Lynch Syndrome/Hereditary non-polyposis colorectal cancer (HNPCC)", "abbr" => "HnpcC", "code" => "315058005", "system" => "SNOMED_CT"],
                ["name" => "Ulcerative Colitis", "abbr" => "Ulc", "code" => "64766004", "system" => "SNOMED_CT"],
                ["name" => "Unknown Gastrointestinal Disorder", "abbr" => "UGI", "code" => "UNGASDIS", "system" => "SNOMED_CT"]
            ),
            "Heart Disease" => array(
                ["name" => "Angina", "abbr" => "AP", "code" => "194828000", "system" => "SNOMED_CT"],
                ["name" => "Coronary Artery Disease", "abbr" => "CAD", "code" => "53741008", "system" => "SNOMED_CT"],
                ["name" => "Heart Attack", "abbr" => "HA", "code" => "22298006", "system" => "SNOMED_CT"],
                ["name" => "Heart Disease", "abbr" => "HD", "code" => "56265001", "system" => "SNOMED_CT"],
                ["name" => "Unknown Heart Disease", "abbr" => "UHD", "code" => "UNHEADIS", "system" => "SNOMED_CT"]
            ),
            "High Cholesterol" => array(
                ["name" => "High Cholesterol", "abbr" => "HCH", "code" => "55822004", "system" => "SNOMED_CT"]
            ),
            "Hypertension" => array(
                ["name" => "Hypertension", "abbr" => "HYP", "code" => "38341003", "system" => "SNOMED_CT"]
            ),
            "Kidney Disease" => array(
                ["name" => "Cystic Kidney Disease", "abbr" => "CKD", "code" => "236439005", "system" => "SNOMED_CT"],
                ["name" => "Diabetic Kidney Disease", "abbr" => "DkD", "code" => "127013003", "system" => "SNOMED_CT"],
                ["name" => "Kidney Disease Present from Birth", "abbr" => "CongKD", "code" => "82525005", "system" => "SNOMED_CT"],
                ["name" => "Kidney Nephrosis", "abbr" => "KN", "code" => "90708001", "system" => "SNOMED_CT"],
                ["name" => "Nephritis", "abbr" => "Nep", "code" => "52845002", "system" => "SNOMED_CT"],
                ["name" => "Other Kidney Disease", "abbr" => "OKD", "code" => "OTKIDDIS", "system" => "SNOMED_CT"],
                ["name" => "Unknown Kidney Disease", "abbr" => "UKD", "code" => "UNKIDDIS", "system" => "SNOMED_CT"]
            ),
            "Lung Disease" => array(
                ["name" => "Asthma", "abbr" => "Ast", "code" => "195967001", "system" => "SNOMED_CT"],
                ["name" => "COPD", "abbr" => "LD", "code" => "13645005", "system" => "SNOMED_CT"],
                ["name" => "Chronic Bronchitis", "abbr" => "ChrB", "code" => "63480004", "system" => "SNOMED_CT"],
                ["name" => "Chronic Lower Respiratory Disease", "abbr" => "CDRS", "code" => "196229000", "system" => "SNOMED_CT"],
                ["name" => "Emphysema", "abbr" => "Emp", "code" => "87433001", "system" => "SNOMED_CT"],
                ["name" => "Influenza/Pneumonia", "abbr" => "InP", "code" => "195878008", "system" => "SNOMED_CT"],
                ["name" => "Lung Disease", "abbr" => "LD", "code" => "19829001", "system" => "SNOMED_CT"],
                ["name" => "Unknown Lung Disease", "abbr" => "ULD", "code" => "UNLUNDIS", "system" => "SNOMED_CT"]
            ),
            "Osteoporosis" => array(
                ["name" => "Osteoporosis", "abbr" => "OST", "code" => "64859006", "system" => "SNOMED_CT"]
            ),
            "Psychological Disorder" => array(
                ["name" => "Anxiety", "abbr" => "Anx", "code" => "197480006", "system" => "SNOMED_CT"],
                ["name" => "Attention Deficit Disorder-Hyperactivity", "abbr" => "ADHA", "code" => "406506008", "system" => "SNOMED_CT"],
                ["name" => "Autism", "abbr" => "Aut", "code" => "408856003", "system" => "SNOMED_CT"],
                ["name" => "Bipolar Disorder", "abbr" => "Bmd", "code" => "13746004", "system" => "SNOMED_CT"],
                ["name" => "Dementia", "abbr" => "Dem", "code" => "52448006", "system" => "SNOMED_CT"],
                ["name" => "Depression", "abbr" => "Dep", "code" => "35489007", "system" => "SNOMED_CT"],
                ["name" => "Eating Disorder", "abbr" => "ED", "code" => "72366004", "system" => "SNOMED_CT"],
                ["name" => "Mental Disorder Unspecified", "abbr" => "MD", "code" => "74732009", "system" => "SNOMED_CT"],
                ["name" => "Obsessive Compulsive Disorder", "abbr" => "OCD", "code" => "191736004", "system" => "SNOMED_CT"],
                ["name" => "Panic Disorder", "abbr" => "PaD", "code" => "371631005", "system" => "SNOMED_CT"],
                ["name" => "Personality Disorder", "abbr" => "PcD", "code" => "33449004", "system" => "SNOMED_CT"],
                ["name" => "Post Traumatic Stress Disorder", "abbr" => "PTSD", "code" => "47505003", "system" => "SNOMED_CT"],
                ["name" => "Schizophrenia", "abbr" => "MD", "code" => "58214004", "system" => "SNOMED_CT"],
                ["name" => "Social Phobia", "abbr" => "Soc", "code" => "25501002", "system" => "SNOMED_CT"],
                ["name" => "Unknown Psychological Disorder", "abbr" => "UPD", "code" => "UNPSYDIS", "system" => "SNOMED_CT"]
            ),
            "Septicemia" => array(
                ["name" => "Septicemia", "abbr" => "Sept", "code" => "105592009", "system" => "SNOMED_CT"]
            ),
            "Stroke/Brain Attack" => array(
                ["name" => "Stroke/Brain Attack", "abbr" => "SBA", "code" => "116288000", "system" => "SNOMED_CT"]
            ),
            "Sudden Infant Death Syndrome" => array(
                ["name" => "Sudden Infant Death Syndrome", "abbr" => "SIDS", "code" => "51178009", "system" => "SNOMED_CT"]
            ),
            "Unknown Disease" => array(
                ["name" => "Unknown Disease", "abbr" => "HD", "code" => "315645005", "system" => "SNOMED_CT"]

            )
        );

        echo "seeding penyakit list";

        foreach ($penyakit as $key => $value) {
            foreach ($value as $key => $sub_value) {
                echo ".";
                $data = array(
                    'kode' => $sub_value['code'],
                    'nama' => $sub_value['name'],
                    'created_at' => $this->faker->date($format = 'Y-m-d'),
                    'updated_at' => $this->faker->date($format = 'Y-m-d'),
                );
                $this->db->insert($this->table, $data);
            }
        }

        echo PHP_EOL;
    }
}
