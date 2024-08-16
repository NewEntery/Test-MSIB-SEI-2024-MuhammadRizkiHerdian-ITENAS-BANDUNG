package com.ptsuryaenergitest.demo;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinTable;
import jakarta.persistence.ManyToMany;

import java.sql.Timestamp;
import java.time.LocalDateTime; // Add this import statement



import org.hibernate.annotations.CreationTimestamp;
import java.util.List;
import jakarta.persistence.JoinColumn;



@Entity
public class Proyek {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    private String namaProyek;
    private String client;
    private LocalDateTime tglMulai;
    private LocalDateTime tglSelesai;
    private String pimpinanProyek;
    private String keterangan;

    @CreationTimestamp
    private Timestamp createdAt;

    @ManyToMany
    @JoinTable(
        name = "proyek_lokasi",
        joinColumns = @JoinColumn(name = "proyek_id"),
        inverseJoinColumns = @JoinColumn(name = "lokasi_id")
    )
    private List<lokasi> lokasi;

    public int getId() {
        return id;
    }   
    public String getClient() {
        return client;
    }
    public String getKeterangan() {
        return keterangan;
    }
    public String getNamaProyek() {
        return namaProyek;
    }
    public String getPimpinanProyek() {
        return pimpinanProyek;
    }
    public LocalDateTime getTglMulai() {
        return tglMulai;
    }
    public LocalDateTime getTglSelesai() {
        return tglSelesai;
    }
    public void setClient(String client) {
        this.client = client;
    }
    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }
    public void setNamaProyek(String namaProyek) {
        this.namaProyek = namaProyek;
    }
    public void setPimpinanProyek(String pimpinanProyek) {
        this.pimpinanProyek = pimpinanProyek;
    }
    public void setTglMulai(LocalDateTime tglMulai) {
        this.tglMulai = tglMulai;
    }
    public void setTglSelesai(LocalDateTime tglSelesai) {
        this.tglSelesai = tglSelesai;
    }
    public Timestamp getCreatedAt() {
        return createdAt;
    }
    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }
    public List<lokasi> getLokasi() {
        return lokasi;
    }
    public void setLokasi(List<lokasi> lokasi) {
        this.lokasi = lokasi;
    }
}

