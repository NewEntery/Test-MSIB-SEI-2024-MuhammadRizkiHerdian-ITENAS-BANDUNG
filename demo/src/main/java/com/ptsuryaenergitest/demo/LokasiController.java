package com.ptsuryaenergitest.demo;

import java.util.List;
import java.util.Map; // Add this import statement
import java.util.HashMap; // Add this import statement
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public lokasi createLokasi(@RequestBody lokasi lokasi) {
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }
    @GetMapping("/{id}")
    public ResponseEntity<lokasi> getLokasiById(@PathVariable Long id) {
        lokasi lokasi = lokasiRepository.findById(id.intValue())
            .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found for this id :: " + id));
        return ResponseEntity.ok(lokasi);
    }

    @PutMapping("/{id}")
    public ResponseEntity<lokasi> updateLokasi(@PathVariable Long id, @RequestBody lokasi lokasiDetails) {
        lokasi lokasi = lokasiRepository.findById(id.intValue())
            .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found for this id :: " + id));

        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setNegara(lokasiDetails.getNegara());
        lokasi.setProvinsi(lokasiDetails.getProvinsi());
        lokasi.setKota(lokasiDetails.getKota());

        final lokasi updatedLokasi = lokasiRepository.save(lokasi);
        return ResponseEntity.ok(updatedLokasi);
    }

    @DeleteMapping("/{id}")
    public Map<String, Boolean> deleteLokasi(@PathVariable Long id) {
        lokasi lokasi = lokasiRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found for this id :: " + id));

        lokasiRepository.delete(lokasi);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return response;
    }
}
