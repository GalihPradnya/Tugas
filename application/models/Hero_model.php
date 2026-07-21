<?php
class Hero_model extends CI_Model
{
    public function getHero()
{
    return $this->db->get('hero_beranda')->row_array();
}

    public function getSlide()
    {
        return $this->db
            ->where('status', 'aktif')
            ->get('hero_slide')
            ->result_array();
    }
    public function updateHero($data)
{
    $this->db->where('id',1);

    return $this->db->update(
        'hero_beranda',
        $data
    );
}
public function getSlides()
{
    return $this->db
        ->where('status', 'aktif')
        ->order_by('id', 'ASC')
        ->get('hero_slide')
        ->result_array();
}
}