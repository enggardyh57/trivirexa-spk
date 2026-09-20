<?php

class laptop_models extends CI_Model
{
    public function getAllLaptop()
    {
        return $this->db->get('laptop')->result_array();
    }

    public function getLaptop($limit, $start)
    {
        return $this->db->get('laptop', $limit, $start)->result_array();
    }

    public function tambahDataLaptop($gambar)
    {
        $harga = $this->input->post('harga');
        $processor = $this->input->post('processor');
        $ram = $this->input->post('ram');
        $ssd = $this->input->post('ssd');
        $berat = $this->input->post('berat');
        $baterai = $this->input->post('baterai');
        $data = [
            'nama_laptop' => $this->input->post('nama_laptop'),
            'gambar'  => $gambar,
            'harga' => $harga,
            'processor' => $processor,
            'ram' => $ram,
            'ssd' => $ssd,
            'baterai' => $baterai,
            'berat' => $berat,

            // konversi
            'harga_saw'     => $this->skor_harga($harga),
            'processor_saw' => $this->skor_processor($processor),
            'ram_saw'       => $this->skor_ram($ram),
            'ssd_saw'       => $this->skor_ssd($ssd),
            'berat_saw'     => $this->skor_berat($berat),
            'baterai_saw'   => $this->skor_baterai($baterai)
        ];

        $this->db->insert('laptop', $data);
    }
    public function hapusDataLaptop($id)
    {
        $this->db->delete('laptop', ['id' => $id]);
    }

    public function getLaptopById($id)
    {
        return $this->db->get_where('laptop', ['id' => $id])->row_array();
    }

    public function editDataLaptop($id,$gambar)
    {
        $harga = $this->input->post('harga');
        $processor = $this->input->post('processor');
        $ram = $this->input->post('ram');
        $ssd = $this->input->post('ssd');
        $berat = $this->input->post('berat');
        $baterai = $this->input->post('baterai');
        $data = [
            'nama_laptop' => $this->input->post('nama_laptop'),
            'gambar'  => $gambar,
            'harga' => $harga,
            'processor' => $processor,
            'ram' => $ram,
            'ssd' => $ssd,
            'baterai' => $baterai,
            'berat' => $berat,

            // konversi
            'harga_saw'     => $this->skor_harga($harga),
            'processor_saw' => $this->skor_processor($processor),
            'ram_saw'       => $this->skor_ram($ram),
            'ssd_saw'       => $this->skor_ssd($ssd),
            'berat_saw'     => $this->skor_berat($berat),
            'baterai_saw'   => $this->skor_baterai($baterai)
        ];


        $this->db->where('id', $id);
        $this->db->update('laptop', $data);
    }




    public function skor_harga($harga)
    {
        if ($harga <= 4579800) return 5;
        elseif ($harga <= 6109600) return 4;
        elseif ($harga <= 7639400) return 3;
        elseif ($harga <= 9169200) return 2;
        else return 1;
    }

    public function skor_processor($processor)
    {
        $processor = strtolower($processor);


        if (
            strpos($processor, 'i7') !== false ||
            strpos($processor, 'ryzen 7') !== false ||
            strpos($processor, 'ultra 5') !== false
        ) {
            return 5;
        } elseif (
            strpos($processor, 'i5') !== false ||
            strpos($processor, 'ryzen 5') !== false
        ) {
            return 4;
        } elseif (
            strpos($processor, 'i3') !== false
        ) {
            return 3;
        } elseif (
            strpos($processor, 'ryzen 3') !== false
        ) {
            return 2;
        } else {
            return 1;
        }
    }

    public function skor_ram($ram)
    {
        if ($ram >= 32) return 5;
        elseif ($ram >= 16) return 4;
        elseif ($ram >= 12) return 3;
        elseif ($ram >= 8) return 2;
        else return 1;
    }

    public function skor_ssd($ssd)
    {
        if ($ssd >= 1024) return 5;
        elseif ($ssd >= 512) return 4;
        elseif ($ssd >= 256) return 3;
        elseif ($ssd >= 128) return 2;
        else return 1;
    }

    public function skor_berat($berat)
    {
        if ($berat <= 1.42) return 5;
        elseif ($berat <= 1.76) return 4;
        elseif ($berat <= 2.09) return 3;
        elseif ($berat <= 2.43) return 2;
        else return 1;
    }

    public function skor_baterai($baterai)
    {
        if ($baterai > 64.6) return 5;
        elseif ($baterai > 57.2) return 4;
        elseif ($baterai > 49.8) return 3;
        elseif ($baterai > 42.4) return 2;
        else return 1;
    }
}
