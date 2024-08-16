package com.ptsuryaenergitest.demo;

import org.hibernate.annotations.CreationTimestamp;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import java.sql.Timestamp;

@Entity
public class lokasi {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO,
    generator="native")
    private int id;

    private String namaLokasi;
    private String negara;
    private String provinsi;
    private String kota;

    @CreationTimestamp
    private Timestamp createdAt;

    // Default constructor
    public lokasi() {
    }

    public int getId() {
        return id;
    }
    
    public String getKota() {
        return kota;
    }
    public String getNamaLokasi() {
        return namaLokasi;
    }
    public String getNegara() {
        return negara;
    }
    public String getProvinsi() {
        return provinsi;
    }
    public void setKota(String kota) {
        this.kota = kota;
    }
    public void setNamaLokasi(String namaLokasi) {
        this.namaLokasi = namaLokasi;
    }
    public void setNegara(String negara) {
        this.negara = negara;
    }
    public void setProvinsi(String provinsi) {
        this.provinsi = provinsi;
    }
    public Timestamp gettiTimestamp() {
        return createdAt;
    }
    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }
    
    // Getters and Setters
}